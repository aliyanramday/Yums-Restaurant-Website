<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'created_at'
    ];

    protected $hidden = [
        'password_hash'
    ];

    // Tell Laravel which field is the password
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
