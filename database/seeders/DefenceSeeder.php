<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('defences')->insert([
            'commission_id' => 1,
            'report_discipline_id' => 1,
            'defence_date' => Carbon::parse('2023-03-10'),
        ]);
    }
}
