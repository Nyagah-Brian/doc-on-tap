<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    // Primary key (important for UUIDs)
    protected $primaryKey = 'id';

    // The "type" of the primary key ID (important for UUIDs)
    protected $keyType = 'string';

    // Indicate that the primary key is not auto-incrementing (UUIDs aren't)
    public $incrementing = false;

    // The attributes that are mass assignable
    protected $fillable = [
        'patient_id', 
        'doctor_id', 
        'appointment_time', 
        'reason_for_appointment',
        'status'
    ];

    // The attributes that should be cast.
    protected $casts = [
        'appointment_time' => 'datetime' // Cast to a datetime object
    ];

    // Define the relationship to the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Define the relationship to the Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
