<?php

namespace App\Http\Controllers;

use App\Models\AcceptedTask;
use Illuminate\Http\Request;

class AdminCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $acceptedTasks = AcceptedTask::whereIn('id', $request->tasks)->get();

        $employeeIds = AcceptedTask::whereIn('id', $request->tasks)->pluck('employee_id');
        $status = $request->has('accepted') ? 'accepted' : 'ditolak';

        foreach ($acceptedTasks as $index => $task) {
            $task->update([
                'status' => $status,
                'employee_id' => $employeeIds[$index],
        ]);
        }
        return redirect('/admin/accepted-task')->with('success', 'Task has been updated!');
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
    public function edit(AcceptedTask $acceptedTask)
    {
        //
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
