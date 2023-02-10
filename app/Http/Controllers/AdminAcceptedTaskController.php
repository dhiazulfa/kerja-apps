<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\AcceptedTask;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminAcceptedTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.accepted-task.index',[
        'acceptedTasks' => AcceptedTask::all(),
        'employees' => Employee::all(),
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
     * @param  \App\Models\AcceptedTask  $acceptedTask
     * @return \Illuminate\Http\Response
     */
    public function show(AcceptedTask $acceptedTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcceptedTask  $acceptedTask
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acceptedTask = AcceptedTask::find($id);

        $employee = Employee::where('user_id', $acceptedTask->employee_id)->first();

        return view('admin.accepted-task.edit',[
            'acceptedTask' => $acceptedTask,
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcceptedTask  $acceptedTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcceptedTask $acceptedTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcceptedTask  $acceptedTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcceptedTask $acceptedTask)
    {
        //
    }
}
