<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'first_name' => 'Jack',
            'surname' => 'Dow',
            'salary' => '1000',
            'department_id' => '1',
            'employment_date' => '1970-01-01',
        ]);

        DB::table('employees')->insert([
            'first_name' => 'John',
            'surname' => 'Smith',
            'salary' => '1000',
            'department_id' => '2',
            'employment_date' => '1970-01-01',
        ]);
    }
}
