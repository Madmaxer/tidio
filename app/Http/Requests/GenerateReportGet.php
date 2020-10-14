<?php

namespace App\Http\Requests;

use App\EmployeeReport;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenerateReportGet extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'surname' => ['sometimes', 'required', 'string', 'max:255'],
            'salary' => ['sometimes', 'required', 'numeric', 'min:0'],
            'department_id' => ['sometimes', 'required', 'exists:employee_report,id'],
            'department_name' => ['sometimes', 'required', 'string', 'max:255'],
            'supplement_amount' => ['sometimes', 'required', 'numeric', 'min:0'],
            'supplement_type' => ['sometimes', 'required',
                Rule::in(EmployeeReport::SUPPLEMENT_TYPE_PERCENT, EmployeeReport::SUPPLEMENT_TYPE_QUOTA)
            ],
            'salary_total' => ['sometimes', 'required', 'numeric', 'min:0'],
        ];
    }
}
