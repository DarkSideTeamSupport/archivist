<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserStatus_Seeder::class,
            UserRoles_Seeder::class,
            UserPositionSeeder::class,
            SpecialtySeeder::class,
            ReportTypeSeeder::class,
            CommissionSeeder::class,
            GroupSeeder::class,
            DisciplineSeeder::class,
            UsersSeeder::class,
        ]);

        Specialization::factory(30)->create();


    }
}
