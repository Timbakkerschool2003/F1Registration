<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }


    public function trophies()
    {
//        return $this->belongsToMany(Trophy::class, 'users_has_trophys', 'users_id', 'trophys_id')
//            ->selectRaw('users_id, count(trophys_id) as trophy_count')
//            ->groupBy('users_id');

        $trophys = Trophy::all();
        return view('teams' , ['teams' => $teams]);
    }

    public function trophiess(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserHasTrophy::class, 'users_id');
    }


}
