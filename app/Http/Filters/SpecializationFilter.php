<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class SpecializationFilter extends AbstractFilter
{

    public const  TITLE = 'title';
    public const  DECODING = 'decoding';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DECODING => [$this, 'decoding'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function decoding(Builder $builder, $value)
    {
        $builder->where('decoding', 'like', "%{$value}%");
    }
}
