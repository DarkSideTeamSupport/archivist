<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory, Filterable;


    protected $table = 'disciplines';
    protected $guarded;

    public function specialty()
    {
        return $this->belongsTo(Specialization::class, 'specialty_id', 'id');
    }


}
