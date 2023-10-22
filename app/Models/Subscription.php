<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{
    use HasFactory, Notifiable;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function routeNotificationForOneSignal()
    {
        // return ['include_player_ids' => ["978f586a-f148-44d5-8660-93ea7cd5e273"]];
        return $this->user->onesignal_player_id;
    }
}
