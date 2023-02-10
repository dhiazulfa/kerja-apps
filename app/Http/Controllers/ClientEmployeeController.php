<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Employee;
use App\Models\AcceptedTask;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user()->id;
    
        $tasks = Task::where('client_id', $user)->get();
        $taskIds = [];
    
        foreach ($tasks as $task) {
            $taskIds[] = $task->id;
        }
        
        return view('admin.clients-employee.index', [
            'acceptedTasks' => AcceptedTask::whereIn('task_id', $taskIds)
            ->whereIn('status',['accepted', 'on_progress', 'done'])
            ->get()
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
    public function show($id)
    {
        $acceptedTask = AcceptedTask::find($id);

        $employee = Employee::where('user_id', $acceptedTask->employee_id)->first();

        return view('admin.clients-employee.show',[
            'acceptedTask' => $acceptedTask,
            'employee' => $employee,
        ]);
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

        return view('admin.clients-employee.edit',[
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
    public function update(Request $request, $id)
    {
        $acceptedTask = AcceptedTask::find($id);
        
        $validatedData = $request->validate([
            'status' => 'required|string',
            'foto_bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('foto_bukti')) {
            $image = $request->file('foto_bukti');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            
            $acceptedTask->foto_bukti = $name;
        }
                
        $acceptedTask->status = $validatedData['status'];
        $acceptedTask->save();
    
        return redirect('/admin/clients-employee')->with('success', 'Status pekerjaan dan foto bukti berhasil diubah!');
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
