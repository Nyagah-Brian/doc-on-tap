<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
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
        'doctor_id', 
        'date', 
        'start_time', 
        'end_time', 
        'status'
    ];

    // The attributes that should be cast.
    protected $casts = [
        'date' => 'date',    // Ensure 'date' is treated as a date object
        'start_time' => 'datetime:H:i', // Format time as HH:mm (24-hour)
        'end_time' => 'datetime:H:i',  // Format time as HH:mm (24-hour)
    ];

    // Define the relationship to the Doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
