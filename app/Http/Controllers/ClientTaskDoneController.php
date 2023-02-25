<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Employee;
use App\Models\AcceptedTask;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientTaskDoneController extends Controller
{
    public function index(){
        $user = Auth::user()->id;
    
        $tasks = Task::where('client_id', $user)->get();
        $taskIds = [];
    
        foreach ($tasks as $task) {
            $taskIds[] = $task->id;
        }
        
        return view('admin.clients-task-done.index', [
            'acceptedTasks' => AcceptedTask::whereIn('task_id', $taskIds)
            ->whereIn('status',['done'])
            ->get()
        ]);
    }
}
