<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use App\Models\User;
use App\Models\Task;
use App\Models\Client;
use App\Models\AcceptedTask;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class EmployeeNotifiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        
        $notifies = Notify::where('pengirim_id', $user_id)
        ->orWhere('user_id', '=', $user_id)
        ->orderByDesc('created_at')
        ->get();

        return view('pekerja.notify.index',[
            'notifies' => $notifies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user  = Auth::user()->id;
        // $user2 = Auth::user()->role;

        // $acceptedTask = AcceptedTask::where('employee_id', $user)->first();
        // // $acceptedTask2 = AcceptedTask::where('employee_id', $user)->get();
        // dd($acceptedTask2);
        // $task_id = Task::where('id',$acceptedTask->task_id)->first();

        // $client_id = Client::where('user_id', $task_id->client_id)->get();
        
        
        
        return view('pekerja.notify.create', [
            'users' => User::where('role', '=', 'penyedia')->get(),
            // 'tasks' => $acceptedTask2
        ]);
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
            'pengirim' => 'required|string',
            'title' => 'required|string',
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

        return redirect('/pekerja/notify')->with('success', 'Notifikasi berhasil dikirim!');
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

        return view('pekerja.notify.show',[
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
