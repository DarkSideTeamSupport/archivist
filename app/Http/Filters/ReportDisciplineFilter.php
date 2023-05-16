<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ReportDisciplineFilter extends AbstractFilter
{
    public const  DISCIPLINE_ID = 'discipline_id';
    public const  REPORT_ID = 'report_id';
    public const  GROUP_ID = 'group_id';
    public const  USER_ID = 'user_id';

    protected function getCallbacks(): array
    {
        return [
          self::DISCIPLINE_ID => [$this, 'disciplineId'],
          self::REPORT_ID => [$this, 'reportId'],
          self::GROUP_ID => [$this, 'groupId'],
          self::USER_ID => [$this, 'userId'],

        ];
    }

    public function disciplineId(Builder $builder, $value)
    {
        $builder->where('discipline_id',  $value);
    }

    public function reportId(Builder $builder, $value)
    {
        $builder->where('report_id',  $value);
    }

    public function groupId(Builder $builder, $value)
    {
        $builder->where('group_id', $value);
    }

    public function userId(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }
}
