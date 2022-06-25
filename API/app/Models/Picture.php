<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_pictures';

    protected $fillable = ['path'];

    public function RealEstates(){
        return $this->belongTo(RealEstate::class);
    }
}
