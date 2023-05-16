<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CommissionMemberFilter extends AbstractFilter
{
    public const  TITLE = 'title';
    public const  COMMISSION_ID = 'commission_id';
    public const  USER_ID = 'user_id';
    public const  EXPIRATION_DATE = 'expiration_date';

    protected function getCallbacks(): array
    {
        return [
          self::TITLE => [$this, 'title'],
          self::COMMISSION_ID => [$this, 'commissionId'],
          self::USER_ID => [$this, 'userId'],
          self::EXPIRATION_DATE => [$this, 'expirationDate'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function commissionId(Builder $builder, $value)
    {
        $builder->where('commission_id',  $value);
    }

    public function userId(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }

    public function expirationDate(Builder $builder, $value)
    {
        $builder->where('expiration_date', $value);
    }
}
