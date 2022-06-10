<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfHeating extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_type_of_heatings';

    protected $fillable = ['name'];

    public function RealEstates(){
        return $this->belongTo(RealEstate::class);
    }
}
