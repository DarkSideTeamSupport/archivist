<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('commissions')->insert([
            'title' => 'ООО ПЦ',
            'date_of_beginning' => fake()->dateTime,
            'expiration_date' => fake()->dateTime,
        ]);

    }
}
