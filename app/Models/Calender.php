<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calender extends Model
{
    use HasFactory;

    public function todos() {
        return $this->hasMany(Todo::class);
    }
}
