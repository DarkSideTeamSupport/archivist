<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefenceReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('defence_reports')->insert([
            'student_id' => 1,
            'defence_id' => 1,
            'commission_id' => 1,
            'theme' => 'Тема1',
            'actual_delivery_date' => Carbon::parse('2023-03-05'),
            'grade' => 4,
            'archivist_mark' => 1,
            'employee_id' => 1,
            'file' => 'null',
            'status' => 1,
        ]);

    }
}
