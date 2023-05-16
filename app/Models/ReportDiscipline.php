<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDiscipline extends Model
{
    use HasFactory, Filterable;


    protected $table = 'report_disciplines';
    protected $guarded;

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id', 'id');

    }


    public function reportType()
    {
        return $this->belongsTo(ReportType::class, 'report_id', 'id');
    }


}
