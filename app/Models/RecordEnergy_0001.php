<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordEnergy_0001 extends Model
{
    use HasFactory;

    protected $fillable = [
        'planta_id',
        'ampValue',
        'voltsValue',
        'time'
    ];
}
