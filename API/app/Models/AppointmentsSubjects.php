<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentsSubjects extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_appointmentsSubjects';

    protected $fillable = ['name'];
}
