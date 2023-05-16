<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CommissionFilter extends AbstractFilter
{
    public const  TITLE = 'title';
    public const  DATE_OF_BEGINNING = 'date_of_beginning';
    public const  EXPIRATION_DATE = 'expiration_date';

    protected function getCallbacks(): array
    {
        return [
          self::TITLE => [$this, 'title'],
          self::DATE_OF_BEGINNING => [$this, 'dateOfBegin'],
          self::EXPIRATION_DATE => [$this, 'expirationDate'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function dateOfBegin(Builder $builder, $value)
    {
        $builder->where('date_of_beginning',  $value);
    }

    public function expirationDate(Builder $builder, $value)
    {
        $builder->where('expiration_date', $value);
    }
}
