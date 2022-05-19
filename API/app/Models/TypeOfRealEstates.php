<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfRealEstates extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_typeOfRealEstate';

    protected $fillable = ['name'];
}
