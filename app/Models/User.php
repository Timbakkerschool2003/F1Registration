<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function trophies()
    {
        return $this->belongsToMany(Trophy::class, 'users_has_trophys', 'users_id', 'trophys_id');
    }
    public function detachTrophies()
    {
        $this->trophies()->detach();
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public static function createUser(array $data)
    {
        return static::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function updateProfile(array $data)
    {
        return $this->profile()->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'mobile' => $data['mobile'],
        ]);
    }

    public function deleteWithProfile()
    {
        return $this->profile()->delete() && $this->delete();
    }
}
