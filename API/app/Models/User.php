<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'g5e1D_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phoneNumber',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'address',
        'postCode',
        'city',
        'archived',
        'role_id',
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
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * establish consensus between the tables and User Model
     */

    public function Appointments()
    {
        return $this->hasMany(Appointments::class);
    }

    public function role()
    {
        return $this->hasMany(Role::class);
    }

    public function Documents()
    {
        return $this->hasMany(Documents::class);
    }

    public function Favorites()
    {
        return $this->hasMany(Favorites::class);
    }
}
