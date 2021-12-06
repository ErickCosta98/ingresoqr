<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugares_asignado extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'seat_name',
        'status',
    ];
}
