<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // TAMBAHKAN BARIS INI
    protected $fillable = [
        'title',
        'content',
    ];
}
