<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeCardController extends Controller
{
    public function show($slug)
    {
        $employee = Employee::where('slug', $slug)->firstOrFail();
        return view('card', compact('employee'));
    }

    public function verify($slug)
    {
        $employee = Employee::where('slug', $slug)->firstOrFail();
        return view('verify', compact('employee'));
    }
}
