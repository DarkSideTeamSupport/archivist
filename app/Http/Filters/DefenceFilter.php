<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class DefenceFilter extends AbstractFilter
{
    public const  COMMISSION_ID = 'commission_id';
    public const  REPORT_DISCIPLINE_ID = 'report_discipline_id';
    public const  DEFENCE_DATE = 'defence_date';

    protected function getCallbacks(): array
    {
        return [
          self::COMMISSION_ID => [$this, 'commissionId'],
          self::REPORT_DISCIPLINE_ID => [$this, 'reportDisciplineId'],
          self::DEFENCE_DATE => [$this, 'defenceDate'],
        ];
    }

    public function commissionId(Builder $builder, $value)
    {
        $builder->where('commission_id', $value);
    }

    public function reportDisciplineId(Builder $builder, $value)
    {
        $builder->where('report_discipline_id',  $value);
    }

    public function defenceDate(Builder $builder, $value)
    {
        $builder->where('defence_date', $value);
    }
}
