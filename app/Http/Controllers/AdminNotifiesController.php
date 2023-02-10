<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminNotifiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notify = Notify::all();
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
        return view('admin.admin-notifies.create', [
            'users' => User::all(),
            'tasks' => Task::all()
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
            'task_id' => 'required|integer',
            'user_id' => 'required|integer',
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $notification = Notify::create($validatedData);

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs(
                '/images',
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
    public function show(Notify $notify)
    {
        //
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
