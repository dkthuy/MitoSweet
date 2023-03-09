<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccounts extends Authenticatable {
    use Notifiable;

    protected $guard = 'user';
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];
}
