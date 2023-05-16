<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class DefenceReportFilter extends AbstractFilter
{
    public const  COMMISSION_ID = 'commission_id';
    public const  STUDENT_ID = 'student_id';
    public const  DEFENCE_ID = 'defence_id';
    public const  EMPLOYEE_ID = 'employee_id';
    public const  STATUS = 'status';

    protected function getCallbacks(): array
    {
        return [
            self::COMMISSION_ID => [$this, 'commissionId'],
            self::STUDENT_ID => [$this, 'studentId'],
            self::EMPLOYEE_ID => [$this, 'employeeId'],
            self::DEFENCE_ID => [$this, 'defenceId'],
            self::STATUS => [$this, 'status'],
        ];
    }

    public function commissionId(Builder $builder, $value)
    {
        $builder->where('commission_id', $value);
    }

    public function studentId(Builder $builder, $value)
    {
        $builder->where('student_id', $value);
    }

    public function employeeId(Builder $builder, $value)
    {
        $builder->where('employee_id', $value);
    }

    public function defenceId(Builder $builder, $value)
    {
        $builder->where('defence_id', $value);
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status', $value);
    }
}
