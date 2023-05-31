<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonInCommission extends Model
{
    use HasFactory, Filterable;

    protected $table = 'person_in_commissions';
    protected $guarded;


    public function person()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
