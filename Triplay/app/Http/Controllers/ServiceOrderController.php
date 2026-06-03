<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceOrderController extends Controller
{
    public function create(Service $service)
    {
        return view('service-orders.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'order_date' => 'required|date|after_or_equal:today',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $totalPrice = $service->price * $validated['quantity'];

        ServiceOrder::create([
            'user_id' => Auth::id(),
            'service_id' => $service->id,
            'order_date' => $validated['order_date'],
            'quantity' => $validated['quantity'],
            'price' => $service->price,
            'total_price' => $totalPrice,
            'status' => 'waiting_payment',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Pemesanan layanan berhasil dibuat.');
    }
}
