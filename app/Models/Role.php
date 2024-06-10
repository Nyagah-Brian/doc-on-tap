<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasUuids,  HasFactory;

    protected $primaryKey = 'uuid';

    public function getPermissionsCountAttribute()
    {
        return $this->permissions->count();
    }
}
