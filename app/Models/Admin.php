<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// ユーザーモデル(Model/User.php)と一緒

class Admin extends Authenticatable
{
    use HasFactory;

    use Notifiable;
 
    protected function redirectTo($request)
    {
        return route('dashboard.login');
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
