<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class StudentFilter extends AbstractFilter
{

    public const  SURNAME = 'surname';
    public const  GROUP_ID = 'group_id';
    public const  COURSE = 'course';

    protected function getCallbacks(): array
    {
        return [
            self::SURNAME => [$this, 'surname'],
            self::GROUP_ID => [$this, 'groupId'],
            self::COURSE => [$this, 'course'],
        ];
    }

    public function surname(Builder $builder, $value)
    {
        $builder->where('surname', 'like', "%{$value}%");
    }

    public function groupId(Builder $builder, $value)
    {
        $builder->where('group_id', $value);
    }

    public function course(Builder $builder, $value)
    {
        $builder->where('course', $value);
    }
}
