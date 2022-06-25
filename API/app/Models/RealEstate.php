<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_real_estate';

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
        'reference',
        'g5e1D_type_of_real_estates_id',
        'g5e1D_type_of_heatings_id',
        'g5e1D_type_of_water_evacuations_id',
        'g5e1D_type_of_contracts_id',
        'g5e1D_cities_id',
        'g5e1D_pictures_id',
    ];

    public function TypeOfRealEstate()
    {
        return $this->hasOne(TypeOfRealEstate::class);
    }

    public function TypeOfHeating(){
        return $this->hasOne(TypeOfHeating::class);
    }

    public function TypeOfWaterEvacuation(){
        return $this->hasOne(TypeOfWaterEvacuation::class);
    }

    public function TypeOfContract(){
        return $this->hasOne(TypeOfContract::class);
    }

    public function City(){
        return $this->hasOne(Cities::class);
    }

    public function Pictures(){
        return $this->hasMany(Picture::class);
    }

    public function Favorites()
    {
        return $this->hasMany(Favorites::class);
    }

}
