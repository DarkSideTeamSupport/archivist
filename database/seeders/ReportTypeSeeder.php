<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reportTypes = [
            'Курсовая','Дипломная','Практика'
        ];

        foreach ($reportTypes as $reportType) {
            DB::table('report_types')->insert([
                'title' => $reportType,
            ]);
        }

    }
}
