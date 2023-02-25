<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\AcceptedTask;
use App\Models\Client;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminEmployeeDoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //BUGGGGGG OJO DI PUSH
        // $acceptedTask = AcceptedTask::where('status', '=', 'done')->pluck('task_id')->first();

        // $task = Task::where('id', $acceptedTask)->pluck('client_id')->first();

        // $client = Client::where('user_id', $task)->first();

        // return view('admin.done-task.index',[
        //     'acceptedTasks' => AcceptedTask::where('status','=', 'done')->get(),
        //     'penyedia' => $client->user->name,
        //     'employees' => Employee::all(),
        // ]);

        return view('admin.done-task.index',[
            'acceptedTasks' => AcceptedTask::where('status','=', 'done')->get(),
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
