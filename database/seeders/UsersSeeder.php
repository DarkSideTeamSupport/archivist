<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'surname' => 'admin',
            'name' => 'admin',
            'patronymic' => 'admin',
            'login' => 'admin',
            'course' => null,
            'email' => fake()->freeEmail(),
            'password' => Hash::make('admin'),
            'group_id' => null,
            'birthday' => null,
            'position_id' => 1,
            'status_id' => 1,
            'role_id' => 1
        ]);
    }
}
