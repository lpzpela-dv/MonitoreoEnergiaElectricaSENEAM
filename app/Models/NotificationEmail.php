<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationEmail extends Model
{
    use HasFactory;
    protected $fillable = [
        'aeropuerto_id',
        'type',
        'emails'
    ];
}
