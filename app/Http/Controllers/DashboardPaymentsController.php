<?php

namespace App\Http\Controllers;

use App\Models\EmployeePayment;
use App\Models\Employee;
use App\Models\Rekening;
use App\Models\AcceptedTask;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
    
        $employee = Employee::where('user_id', $user->id)->first();
    
        $rekening = Rekening::where('employee_id', $employee->id)->first();
        
        if ($rekening) {
            $payments = EmployeePayment::where('rekening_id', $rekening->id)->get();
        } else {
            $payments = [];
        }
    
        return view('pekerja.payments.index', [
            'payments' => $payments
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePayment $employeePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeePayment $employeePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeePayment $employeePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePayment $employeePayment)
    {
        //
    }
}
