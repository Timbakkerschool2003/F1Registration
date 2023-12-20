<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    protected $table = 'scoreboard';
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
