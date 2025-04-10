<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_icon',
        'service_banner',
        'service_images',
        'service_title',
        'service_details',
    ];

    protected $casts = [
        'service_images' => 'array',
    ];
}