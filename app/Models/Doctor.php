<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
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
        'user_id', 
        'speciality_id', 
        'license_number', 
        'years_of_experience', 
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Speciality model
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
