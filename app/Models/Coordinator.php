<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Coordinator extends Authenticatable
{
    use Notifiable;

    protected $table = 'coordinators'; // ye specify krna zaroori hai

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
