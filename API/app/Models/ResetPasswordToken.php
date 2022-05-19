<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_ResetPasswordToken';

    protected $fillable = ['created_at', 'endDate', 'uniqId', 'token', 'salt', 'algo'];
}
