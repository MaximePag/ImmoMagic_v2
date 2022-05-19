<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfWaterEvacuations extends Model
{
    use HasFactory;

    protected $table = 'g5eD_typeOfWaterEvacuation';

    protected $fillable = ['name'];
}

