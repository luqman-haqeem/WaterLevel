<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CurrentLevel extends Model
{

    use HasFactory,Sortable;
    public $sortable = ['alert_level', 'updated_at'];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
