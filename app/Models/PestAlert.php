<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PestAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'pest_name',
        'affected_crops',
        'severity',
        'status',
        'alert_date',
        'expiry_date',
        'location',
        'crop'
    ];

    protected $casts = [
        'alert_date' => 'date',
        'expiry_date' => 'date'
    ];
}
