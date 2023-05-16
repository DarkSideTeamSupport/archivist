<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            'admin','student','employee','commission_member'
        ];

        foreach ($positions as $position) {
            DB::table('user_positions')->insert([
                'title' => $position,
            ]);
        }

    }
}
