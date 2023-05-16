<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatus_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userStatuses = [
            'active','banned'
        ];

        foreach ($userStatuses as $userStatus) {
            DB::table('user_statuses')->insert([
                'title' => $userStatus,
            ]);
        }

    }
}
