<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Region;
use App\Models\Subregion;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user()->id;
        $user2 = Auth::user()->role;

        if($user2 == 'admin'){
            return view('admin.tasks.index',[
                'tasks' => Task::orderByDesc('created_at')->get()
            ]);
        } else {
            return view('admin.tasks.index',[
                'tasks' => Task::where('client_id', $user)->orderByDesc('created_at')->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasks.create', [
            'regions' => Region::all(),
            'subregions' => Subregion::all(),
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
        'title' => 'required|string',
        'region_id' => 'required',
        'subregion_id' => 'required',
        'slug' => 'required|string|unique:tasks',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'body' => 'required|string',
        'alamat' => 'required|string',
        'link_maps' => 'required|string',
        'waktu_pekerjaan' => 'required|string',
        'jam_masuk' => 'required|date_format:H:i:s',
        'jam_selesai' => 'required|date_format:H:i:s',
        'tgl_mulai' => 'required|date',
        'tgl_selesai' => 'required|date',
        'punishment' => 'required',
        'price' => 'required|numeric',
        'jumlah_kebutuhan' => 'required|numeric',
        'jk_pekerja' => 'required|string',
        'umur_min' => 'required|numeric',
        'umur_max' => 'required|numeric',
    ]);

    $client_id = Auth::user()->id;

    $task = new Task([
        'client_id' => $client_id,
        'title' => $validatedData['title'],
        'region_id' => $validatedData['region_id'],
        'subregion_id' => $validatedData['subregion_id'],
        'slug' => $validatedData['slug'],
        'image' => $validatedData['image'],
        'body' => $validatedData['body'],
        'alamat' => $validatedData['alamat'],
        'link_maps' => $validatedData['link_maps'],
        'waktu_pekerjaan' => $validatedData['waktu_pekerjaan'],
        'status' => 'inactive',
        'jam_masuk' => $validatedData['jam_masuk'],
        'jam_selesai' => $validatedData['jam_selesai'],
        'tgl_mulai' => $validatedData['tgl_mulai'],
        'tgl_selesai' => $validatedData['tgl_selesai'],
        'punishment' => $validatedData['punishment'],
        'price' => $validatedData['price'],
        'jumlah_kebutuhan' => $validatedData['jumlah_kebutuhan'],
        'jk_pekerja' => $validatedData['jk_pekerja'],
        'umur_min' => $validatedData['umur_min'],
        'umur_max' => $validatedData['umur_max'],
    ]);

    $task['excerpt'] = Str::limit(strip_tags($request->body), 100);
    $task->save();

    return redirect('/admin/tasks')->with('success', 'Tasks has been created!');
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

        return view('admin.tasks.edit',[
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
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'status' => 'required|string'
        ]);
    
        $task->update([
            'status' => $validatedData['status']
        ]);
    
        return redirect('/admin/tasks')->with('success', 'Tasks has been updated!');
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
