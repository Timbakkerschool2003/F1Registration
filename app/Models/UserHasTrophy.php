<?php
// app\Models\UsersHasTrophy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasTrophy extends Model
{
    protected $table = 'users_has_trophys';

    // Vul dit aan met eventuele andere instellingen die je nodig hebt

    // Relatie met de User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relatie met de Trophy
    public function trophy()
    {
        return $this->belongsTo(Trophy::class, 'trophys_id');
    }
}
