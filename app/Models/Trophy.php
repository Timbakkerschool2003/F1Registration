<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    protected $table = 'trophys';
    protected $fillable = ['trophyname'];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'drivers_has_trophys', 'trophys_id', 'drivers_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_trophys', 'trophys_id', 'users_id');
    }

}
