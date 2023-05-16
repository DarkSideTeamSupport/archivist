<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoles_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRoles = [
            'Админ','Студент','Учебная часть','Преподаватель','Отдел практики','Сотрудник комиссии'
        ];

        foreach ($userRoles as $userRole) {
            DB::table('user_roles')->insert([
                'title' => $userRole,
            ]);
        }

    }
}
