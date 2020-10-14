<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Department 1',
            'supplement_type' => 'quota',
            'supplement_amount' => '100',
        ]);

        DB::table('departments')->insert([
            'name' => 'Department 2',
            'supplement_type' => 'percent',
            'supplement_amount' => '10',
        ]);
    }
}
