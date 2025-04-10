<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoteBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'birthdate',
        'birthtime',
        'birthplace',
        'city',
        'address',
        'google_location',
        'layout_map',
        'compass_reading',
        'property_video',
        'additional_notes'
    ];
}
