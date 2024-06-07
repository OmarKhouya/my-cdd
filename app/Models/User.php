<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Subscriptions;
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
        'category',
        'size',
        'plan',

    ];

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
        'plan' => Subscriptions::class,
    ];
    public function offer()
    {
        return $this->belongsToMany(Offers::class, 'assignments')->withPivot(['accepted', 'created_at']);
    }

    public function linkings()
    {
        return $this->hasMany(Linking::class, 'user_id');
    }

    public function linkedBy()
    {
        return $this->hasMany(Linking::class, 'linked_user_id');
    }
}
