<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function addEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:employees',
            'username' => 'required|string',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:6',
            'region' => 'required|string|max:50',
            'country_id' => 'required|exists:countries,id',
            'phone_number' => 'required|numeric|digits:10',
            'join_date' => 'required',
            'employee_number' => 'required|numeric',
            'amount_of_vacation_days' => 'nullable|numeric',
            'amount_of_hours_work' => 'nullable|string',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $employee = new Employee;
        $employee->user_id = auth()->user()->id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->username = $request->username;
        $employee->password = bcrypt($request->password);
        $employee->address = $request->address;
        $employee->zipcode = $request->zipcode;
        $employee->region = $request->region;
        $employee->country_id = $request->country_id;
        $employee->phone_number = $request->phone_number;
        $employee->join_date = $request->join_date;
        $employee->employee_number = $request->employee_number;
        $employee->amount_of_vacation_days = $request->amount_of_vacation_days;
        $employee->amount_of_hours_work = $request->amount_of_hours_work;
        $employee->status = 1;
        $employee->save();

        return response()->json(['Employee created successfully']);
    }

    public function editEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100',
            'username' => 'required|string',
            'password' => 'nullable|string|min:6',
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:6',
            'region' => 'required|string|max:50',
            'country_id' => 'required|exists:countries,id',
            'phone_number' => 'required|numeric|digits:10',
            'join_date' => 'required',
            'employee_number' => 'required|numeric',
            'amount_of_vacation_days' => 'nullable|numeric',
            'amount_of_hours_work' => 'nullable|string',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $employee = Employee::find($request->id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->username = $request->username;
        $employee->password = $request->password ? bcrypt($request->password) : $employee->password;
        $employee->address = $request->address;
        $employee->zipcode = $request->zipcode;
        $employee->region = $request->region;
        $employee->country_id = $request->country_id;
        $employee->phone_number = $request->phone_number;
        $employee->join_date = $request->join_date;
        $employee->employee_number = $request->employee_number;
        $employee->amount_of_vacation_days = $request->amount_of_vacation_days;
        $employee->amount_of_hours_work = $request->amount_of_hours_work;
        $employee->status = $request->status;
        $employee->save();
        if (!$employee) {
            return response()->json(['message' => 'Something Went wrong', 'data' => null],500);

        }
        return response()->json(['message' => 'Employee Update Successfully', 'data' => $employee],200);
    }
}
