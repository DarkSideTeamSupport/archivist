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
            'admin','student','educational_part','teacher','practice_department','commission_member'
        ];

        foreach ($userRoles as $userRole) {
            DB::table('user_roles')->insert([
                'title' => $userRole,
            ]);
        }

    }
}
