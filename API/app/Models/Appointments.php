<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_appointments';

    protected $fillable = [ 'dateHour', 'notes', 'comments'];
}

