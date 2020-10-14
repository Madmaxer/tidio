<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeReportView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    private function dropView(): string
    {
        return "DROP VIEW IF EXISTS `employee_report`;";
    }

    private function createView(): string
    {
        return "CREATE VIEW `employee_report` AS
        SELECT
            x.employee_id,
            x.first_name,
            x.surname,
            x.salary,
            x.department_id,
            x.department_name,
            x.supplement_amount,
            x.supplement_type,
            CASE
                WHEN x.supplement_type = 'percent'
                    THEN ROUND((x.salary * x.supplement_amount / 100) + x.salary, 2)
                WHEN x.supplement_type = 'quota' AND x.date_diff >= 10
                    THEN ROUND(x.supplement_amount * 10 + x.salary, 2)
                ELSE
                    ROUND(x.supplement_amount * x.date_diff + x.salary, 2)
            END as salary_total
        FROM (
            SELECT
                e.id as employee_id,
                e.first_name,
                e.surname,
                e.salary,
                e.department_id,
                d.name as department_name,
                d.supplement_amount,
                d.supplement_type,
                (YEAR(now()) - YEAR(e.employment_date) - (DATE_FORMAT(now(), '%m%d') < DATE_FORMAT(e.employment_date, '%m%d'))) as date_diff
            FROM employees e INNER JOIN departments d ON (e.department_id = d.id)
        ) as x
        ";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }
}
