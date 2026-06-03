<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingService;
use App\Models\Destination;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Destination $destination)
    {
        $services = Service::where('is_active', true)
            ->orderBy('type')
            ->orderBy('name')
            ->get();

        return view('bookings.create', compact('destination', 'services'));
    }

    public function store(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'customer_phone' => 'required|string|max:30',
            'booking_date' => 'required|date|after_or_equal:today',
            'participant_count' => 'required|integer|min:1',
            'payment_method' => 'required|in:bank_transfer,app_payment,cash',
            'notes' => 'nullable|string',
            'services' => 'nullable|array',
            'services.*.selected' => 'nullable|boolean',
            'services.*.id' => 'nullable|exists:services,id',
            'services.*.quantity' => 'nullable|integer|min:1',
        ]);

        $participantCount = (int) $validated['participant_count'];
        $basePrice = $destination->price * $participantCount;
        $serviceTotal = 0;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'destination_id' => $destination->id,
            'customer_phone' => $validated['customer_phone'],
            'booking_date' => $validated['booking_date'],
            'participant_count' => $participantCount,
            'base_price' => $basePrice,
            'service_total' => 0,
            'total_price' => $basePrice,
            'status' => 'waiting_payment',
            'payment_method' => $validated['payment_method'],
            'notes' => $validated['notes'] ?? null,
        ]);

        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $item) {
                if (empty($item['selected']) || empty($item['id'])) {
                    continue;
                }

                $service = Service::find($item['id']);

                if (!$service) {
                    continue;
                }

                $quantity = isset($item['quantity']) ? (int) $item['quantity'] : 1;
                $subtotal = $service->price * $quantity;

                BookingService::create([
                    'booking_id' => $booking->id,
                    'service_id' => $service->id,
                    'quantity' => $quantity,
                    'price' => $service->price,
                    'subtotal' => $subtotal,
                ]);

                $serviceTotal += $subtotal;
            }
        }

        $booking->update([
            'service_total' => $serviceTotal,
            'total_price' => $basePrice + $serviceTotal,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Booking berhasil dibuat. Silakan lanjutkan proses pembayaran.');
    }
}
