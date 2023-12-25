<?php

// App\Models\Scoreboard.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    use HasFactory;

    protected $fillable = ['time', 'drivers_id', 'date', 'circuit'];

    // Relatie met de Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'drivers_id');
    }
}
