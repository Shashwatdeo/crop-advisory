<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'alert_type',
        'severity',
        'status',
        'alert_date',
        'expiry_date',
        'affected_areas',
        'region',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'alert_date' => 'date',
        'expiry_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date'
    ];
}
