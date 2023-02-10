<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use App\Models\AcceptedTask;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id_user = Auth::user()->id;
        
        $tasks = AcceptedTask::where('employee_id', $id_user)
        ->whereIn('status', ['accepted', 'on_progress'])
        ->get();

        return view('pekerja.tasks.index',[
            'tasks' => $tasks,
            // 'name' => $name,
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
        $validatedData = $request->validate([
            'task_id' => 'required',
        ]);
    
        $employee_id = Auth::user()->id;
    
        $task = new AcceptedTask([
            'task_id' => $validatedData['task_id'],
            'employee_id' => $employee_id,
            'status' => 'inactive',
        ]);

        $task->save();
    
        return redirect('/tasks')->with('success', 'Task telah diambil! Tunggu konfirmasi dari admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {   
        $name = User::where('id', $task->client_id)->pluck('name')->first();

        return view('pekerja.tasks.edit',[
            'task' => $task,
            'name' => $name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
        $task = Task::find($id);
        
        $validatedData = $request->validate([
            'status' => 'required|string'
        ]);
                
        $task->status = $validatedData['status'];
        $user->save();
            
        // update pada table AcceptedTask
        $acceptedTask = AcceptedTask::where('task_id', $task->id)->first();
        $acceptedTask->status = $validatedData['status'];
        $acceptedTask->save();
    
        return redirect('/pekerja')->with('success', 'Task diambil dan akan diverifikasi admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
