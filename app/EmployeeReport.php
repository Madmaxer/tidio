<?php

namespace App;

use App\EloquentSort\Sortable;
use App\ModelFilters\EmployeeReportFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class EmployeeReport extends Model
{
    use Filterable, Sortable;

    protected $table = 'employee_report';

    // supplement types
    const SUPPLEMENT_TYPE_PERCENT = 'percent';
    const SUPPLEMENT_TYPE_QUOTA = 'quota';

    // report fields
    const EMPLOYEE_FIRST_NAME = 'first_name';
    const EMPLOYEE_SURNAME = 'surname';
    const EMPLOYEE_SALARY = 'salary';
    const EMPLOYEE_DEPART_ID = 'department_id';
    const EMPLOYEE_DEPART_NAME = 'department_name';
    const EMPLOYEE_SUPPLEMENT_AMOUNT = 'supplement_amount';
    const EMPLOYEE_SUPPLEMENT_TYPE = 'supplement_type';
    const EMPLOYEE_SALARY_TOTAL = 'salary_total';

    protected $guarded = ['*'];
    protected $sortable = [
        self::EMPLOYEE_FIRST_NAME,
        self::EMPLOYEE_SURNAME,
        self::EMPLOYEE_SALARY,
        self::EMPLOYEE_DEPART_NAME,
        self::EMPLOYEE_SUPPLEMENT_AMOUNT,
        self::EMPLOYEE_SUPPLEMENT_TYPE,
        self::EMPLOYEE_SALARY_TOTAL,
    ];

    public function modelFilter()
    {
        return $this->provideFilter(EmployeeReportFilter::class);
    }
}
