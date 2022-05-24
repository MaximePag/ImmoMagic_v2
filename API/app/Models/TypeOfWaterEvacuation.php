<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfWaterEvacuation extends Model
{
    use HasFactory;

    protected $table = 'g5eD_typeOfWaterEvacuations';

    protected $fillable = ['name'];
}
