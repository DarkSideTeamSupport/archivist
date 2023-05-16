<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefenceReport extends Model
{
    use HasFactory, Filterable;


    protected $table = 'defence_reports';
    protected $guarded;


    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id', 'id');
    }

    public function director()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');

    }

    public function defence()
    {
        return $this->belongsTo(Defence::class, 'defence_id', 'id');
    }


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

}
