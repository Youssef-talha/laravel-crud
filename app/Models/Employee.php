<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nom',
        'tel',
        'email',
        'password',
        'cv'
    ];
    use HasFactory;
}
