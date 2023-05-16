<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Filterable;

    protected $table = 'users';
    protected $guarded;

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo(UserPosition::class, 'position_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'status_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function manager()
    {
        return $this->belongsTo(DefenceReport::class, 'employee_id', 'id');
    }

}
