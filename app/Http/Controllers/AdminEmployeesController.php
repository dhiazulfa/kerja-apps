<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;

class AdminEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = Employee::all();
        return view('admin.users.index',[
            'users' => $users
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        $name = User::where('id', $employee->user_id)->pluck('name')->first();
        $education = Education::where('id', $employee->education_id)->pluck('name')->first();
        
        // dd($education);
        
        return view('admin.users.edit',[
            'employee' => $employee,
            'name' => $name,
            'education' => $education,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        
        $user = User::where('id', $employee->user_id)->first();
                
        $validatedData = $request->validate([
            'status' => 'required|string'
        ]);
                
        $user->status = $validatedData['status'];
        $user->save();
            
        return redirect('/admin/pekerja')->with('success', 'Users has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
