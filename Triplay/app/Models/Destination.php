<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destination extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'price',
        'image',
        'description',
        'location',
        'meeting_point',
        'estimated_duration',
        'altitude_mdpl',
        'difficulty_level',
        'facilities',
        'safety_notes',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($destination) {
            if (empty($destination->slug)) {
                $destination->slug = Str::slug($destination->title);
            }
        });

        static::updating(function ($destination) {
            if (empty($destination->slug)) {
                $destination->slug = Str::slug($destination->title);
            }
        });
    }
}
