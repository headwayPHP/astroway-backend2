<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
        'time_of_day',
        'way_to_reach',
        'preferred_date',
        'preferred_time',
        'address',
        'reason',
    ];
}