<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortName',
        'description',
    ];
    public function NotificationsEmails()
    {
        return $this->hasMany('NotificationEmail');
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($aeropuerto) {
            $aeropuerto->NotificationsEmails->delete();
        });
    }
}
