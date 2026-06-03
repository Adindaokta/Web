<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'destination_id',
        'customer_phone',
        'booking_date',
        'participant_count',
        'base_price',
        'service_total',
        'total_price',
        'status',
        'payment_method',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function services()
    {
        return $this->hasMany(BookingService::class);
    }

    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }
}
