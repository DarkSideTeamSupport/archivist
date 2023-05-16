<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GroupFilter extends AbstractFilter
{

    public const  TITLE = 'title';
    public const  SPECIALTY_ID = 'specialty_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::SPECIALTY_ID => [$this, 'specialtyId'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function specialtyId(Builder $builder, $value)
    {
        $builder->where('specialty_id', $value);
    }
}
