<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    public $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'role',
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'province',
        'postal_code',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
