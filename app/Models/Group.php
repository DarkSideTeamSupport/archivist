<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, Filterable;


    protected $table = 'groups';
    protected $guarded;

    public function specialty()
    {
        return $this->belongsTo(Specialization::class, 'specialty_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'group_id', 'id');
    }
}
