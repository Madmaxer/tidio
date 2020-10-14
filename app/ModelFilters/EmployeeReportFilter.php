<?php

namespace App\ModelFilters;

use App\EmployeeReport;
use EloquentFilter\ModelFilter;

class EmployeeReportFilter extends ModelFilter
{
    public function firstName($firstName)
    {
        return $this->where(EmployeeReport::EMPLOYEE_FIRST_NAME, 'LIKE', "$firstName%");
    }

    public function surname($surname)
    {
        return $this->where(EmployeeReport::EMPLOYEE_SURNAME, 'LIKE', "$surname%");
    }

    public function department($id)
    {
        return $this->where(EmployeeReport::EMPLOYEE_DEPART_ID, (int) $id);
    }
}
