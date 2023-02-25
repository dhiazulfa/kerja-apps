<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use App\Models\User;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Task;
use App\Models\AcceptedTask;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminNotifiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = Auth::user()->id;

        $notify = Notify::where('pengirim_id', '=', $user_id)
        ->orWhere('user_id', '=', $user_id)
        ->orderByDesc('created_at')
        ->get();
        
        return view('admin.admin-notifies.index',[
            'notifies' => $notify
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $user  = Auth::user()->id;
        $user2 = Auth::user()->role;

        if($user2 =='admin'){
        return view('admin.admin-notifies.create', [
            'users' => User::where('role', '=','pekerja')
            ->orWhere('role', '=','penyedia')->get(),
            'tasks' => Task::all()
        ]);
        } else{
            
            // $client_id = Client::where('user_id', $user)->pluck('user_id')->first();
            // $task_id = Task::where('client_id',$client_id)->get();
            // $task = Task::where('client_id', $client_id)->firstOrFail();
            
            // $employee_id = AcceptedTask::where('task_id', $task->id)->get();
            // dd($employee_id);

            return view('admin.admin-notifies.create', [
                'users' => User::where('role', '=','pekerja')
                ->orWhere('role', '=','admin')->get(),
                // 'tasks' => $task_id
            ]);
        }
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
            'user_id' => 'required|integer',
            'pengirim_id' => 'required|integer',
            'title' => 'required|string',
            'pengirim' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $notification = Notify::create($validatedData);

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs(
                'employee/notify',
                $notification->id . '.' . $request->file('image')->extension()
            );
        }

        return redirect('/admin/admin-notifies')->with('success', 'Notifikasi berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notify = Notify::find($id);

        $user = User::where('id', $notify->user_id)->first();

        return view('admin.admin-notifies.show',[
            'notify' => $notify,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function edit(Notify $notify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notify $notify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notify $notify)
    {
        //
    }
}
