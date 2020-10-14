<?php

namespace App\Http\Controllers;

use App\EmployeeReport;
use App\Http\Requests\GenerateReportGet;

class GenerateReportController extends Controller
{
    public function index(GenerateReportGet $request)
    {
        return EmployeeReport::filter($request->all())->sortBy($request)->get();
    }
}
