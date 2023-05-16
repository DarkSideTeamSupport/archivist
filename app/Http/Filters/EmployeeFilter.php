<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class EmployeeFilter extends AbstractFilter
{

    public const  SURNAME = 'surname';
    public const  NAME = 'name';
    public const  PATRONYMIC = 'patronymic';
    public const  LOGIN = 'login';
    public const  EMAIL = 'email';
    public const  ROLE_ID = 'role_id';
    public const  POSITION_ID = 'position_id';
    public const  STATUS_ID = 'status_id';


    protected function getCallbacks(): array
    {
        return [
            self::SURNAME => [$this, 'surname'],
            self::NAME => [$this, 'name'],
            self::PATRONYMIC => [$this, 'patronymic'],
            self::LOGIN => [$this, 'login'],
            self::EMAIL => [$this, 'email'],
            self::ROLE_ID => [$this, 'roleId'],
            self::POSITION_ID => [$this, 'positionId'],
            self::STATUS_ID => [$this, 'statusId'],
        ];
    }

    public function surname(Builder $builder, $value)
    {
        $builder->where('surname', 'like', "%{$value}%");
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }
    public function patronymic(Builder $builder, $value)
    {
        $builder->where('patronymic', 'like', "%{$value}%");
    }
    public function login(Builder $builder, $value)
    {
        $builder->where('login', 'like', "%{$value}%");
    }
    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }
    public function roleId(Builder $builder, $value)
    {
        $builder->where('role_id', $value);
    }
    public function positionId(Builder $builder, $value)
    {
        $builder->where('position_id', $value);
    }
    public function statusId(Builder $builder, $value)
    {
        $builder->where('status_id', $value);
    }


}
