<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Camera extends Model
{
    use HasFactory, Sortable;
    protected $fillable = ['station_id'];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function district()
    {
        return $this->belongsTo(Districts::class);
    }
}
