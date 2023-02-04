<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Station extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'station_name', 'district'];

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
}
