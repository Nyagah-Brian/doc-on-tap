<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Speciality extends Model
{
    use HasUuids, HasFactory;

    // Primary key (important for UUIDs)
    protected $primaryKey = 'id';

    // The "type" of the primary key ID (important for UUIDs)
    protected $keyType = 'string';

    // Indicate that the primary key is not auto-incrementing (UUIDs aren't)
    public $incrementing = false;

    // The attributes that are mass assignable
    protected $fillable = [
        'name', 
        'description'
    ];
}
