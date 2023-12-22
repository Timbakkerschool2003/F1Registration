<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Authenticatable
{
    protected $fillable = ['name', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function trophies()
    {
        return $this->belongsToMany(Trophy::class, 'drivers_has_trophys', 'drivers_id', 'trophys_id');
    }
}
