<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfRealEstate extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_typeOfRealEstates';

    protected $fillable = ['name'];
}
