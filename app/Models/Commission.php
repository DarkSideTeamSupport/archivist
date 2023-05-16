<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory, Filterable;

    protected $table = 'commissions';
    protected $guarded;


    public function user()
    {
        return $this->belongsToMany(User::class, 'person_in_commissions', 'commission_id', 'user_id');
    }

    public function persons()
    {
        return $this->hasMany(PersonInCommission::class, 'commission_id', 'id');
    }
}
