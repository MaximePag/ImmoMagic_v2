<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_roles';

    protected $fillable = ['name'];


    public function User(){
        return $this->belongTo(User::class);
    }
}
