<?php
// app\Models\UserHasTrophy.php

namespace App\Models;
use App\Models\User;
use App\Models\Trophy;

use Illuminate\Database\Eloquent\Model;

class userhastrophy extends Model
{
    // ... (existing code)

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function trophy()
    {
        return $this->belongsTo(Trophy::class, 'trophys_id');
    }
}
