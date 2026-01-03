<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public $timestamps = false; // <--- tambahkan ini

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'image',
        'category',
    ];
}
