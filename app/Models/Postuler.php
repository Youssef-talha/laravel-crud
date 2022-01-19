<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postuler extends Model
{
    protected $fillable = [
        'employee_id',
        'offre__emplois_id',
        'date_postule'
    ];
    use HasFactory;
}
