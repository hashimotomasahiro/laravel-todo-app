<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender2 extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
