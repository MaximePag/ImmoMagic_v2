<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_favorites';

    protected $fillable = [
        'g5e1D_real_estate_id',
        'g5e1D_users_id'
    ];

    public function RealEstates(){
        return $this->belongTo(RealEstate::class);
    }

    public function Users(){
        return $this->belongTo(User::class);
    }
}
