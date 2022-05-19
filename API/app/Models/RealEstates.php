<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstates extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_realEstates';

    protected $fillable = [
        'address',
        'price',
        'expenses',
        'description',
        'numberOfViews',
        'livingArea',
        'landArea',
        'roomNumber',
        'bedRoomNumber',
        'bathRoomNumber',
        'toiletNumber',
        'floorNumber',
        'constructionYear',
        'GES',
        'DPE',
        'archived',
        'reference'
    ];
}
