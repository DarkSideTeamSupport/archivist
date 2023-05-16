<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defence extends Model
{
    use HasFactory, Filterable;


    protected $table = 'defences';
    protected $guarded;

    public function reports()
    {
        return $this->hasMany(DefenceReport::class, 'defence_id', 'id');
    }

    public function reportDiscipline()
    {

        return $this->belongsTo(ReportDiscipline::class, 'report_discipline_id', 'id');
    }


    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id', 'id');
    }
}
