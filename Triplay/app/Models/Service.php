<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'price',
        'unit',
        'image',
        'is_active',
    ];

    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }

    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}
