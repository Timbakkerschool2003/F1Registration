<?php

// App\Models\Scoreboard.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    use HasFactory;

    protected $fillable = ['time', 'users_id', 'teams_id', 'circuits_id', 'date'];

    // Relatie met de Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'drivers_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
