<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;

class Station extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'JPS_sel_id',
        'public_info_id',
        'district_id',
        'station_name',
        'station_code',
        'ref_name',
        'latitude',
        'longitude',
        'gsmNumber',
        'normal_water_level',
        'alert_water_level',
        'warning_water_level',
        'danger_water_level',
        'station_status',
        'mode',
        'z1',
        'z2',
        'z3',
        'battery_level',

    ];
    public $sortable = ['id', 'station_name', 'district_id'];

    public function current_level()
    {
        return $this->hasOne(CurrentLevel::class);
    }
    public function district()
    {
        return $this->belongsTo(Districts::class);
    }
    public function camera()
    {
        return $this->hasOne(Camera::class);
    }
    public function favorite()
    {
        return $this->hasMany(Subscription::class)->where("user_id", Auth::id());
    }
    public function subscribedUsers()
    {
        return $this->hasMany(Subscription::class);
    }
}
