<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
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
         'medical_record_number', 
         'emergency_contact', 
         'medical_history'
     ];
 
     // The attributes that should be cast.
     protected $casts = [
         'emergency_contact' => 'array',
         'medical_history' => 'array'   
     ];
 
     // Define the relationship to the User model
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
