<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportDisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_disciplines')->insert([
            'discipline_id' => 1,
            'report_id' => 1,
            'group_id' => 1,
            'user_id' => 1,
            'planned_delivery_date' => Carbon::parse('2023-03-10'),
        ]);
    }
}
