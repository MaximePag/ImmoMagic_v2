<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'g5e1D_appointments';

    protected $fillable = [ 'dateHour', 'notes', 'comments', 'g5e1D_user_id', 'g5e1D_realEstate_id', 'g5e1D_appointmentsSubject_id'];

    public function appointmentsSubjects()
    {
        return $this->belongsTo(AppointmentsSubjects::class);
    }
}
