<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .session('token')
        ])->get('http://127.0.0.1:8000/api/employee');

        $employees = $response->object();

        return view('employee.index',[
            'employees' => $employees
        ]);
    }

    public function show($id){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .session('token')
        ])->get("http://127.0.0.1:8000/api/employee/$id");

        $employeeInfo = $response->object();                
        
        return view('employee.attendance', [
            'employeeInfo' => $employeeInfo
        ]);
    }
}
