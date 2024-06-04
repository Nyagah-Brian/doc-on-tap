<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
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
        'appointment_id',
        'total_amount',
        'status'
    ];

    // Define the relationship to the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Define the relationship to the Appointment model
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
