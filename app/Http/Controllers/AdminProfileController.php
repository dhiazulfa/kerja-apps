<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();

        return view('admin.profile.edit', [
            'user' => $user,
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone_number' => 'required|string|max:255',
            'nib' => 'required|numeric',
            'kategori_bisnis' => 'required|string|max:255',
            'keterangan_tambahan' => 'nullable|string',
            'alamat' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_kantor' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_nib' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->save();
        
        $client = Client::where('user_id', $user->id)->first();
        $client->nib = $request->input('nib');
        $client->kategori_bisnis = $request->input('kategori_bisnis');
        $client->keterangan_tambahan = $request->input('keterangan_tambahan');
        $client->alamat = $request->input('alamat');
        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $logo_path = $logo->store('employee/logo');
            // $client->logo = str_replace('employee/logo', '', $logo_path);
        }
        if ($request->has('foto_kantor')) {
            $foto_kantor = $request->file('foto_kantor');
            $foto_kantor_path = $foto_kantor->store('employee/foto_kantor');
            // $client->foto_kantor = str_replace('employee/foto_kantor', '', $foto_kantor_path);
        }
        if ($request->has('foto_nib')) {
            $foto_nib = $request->file('foto_nib');
            $foto_nib_path = $foto_nib->store('employee/foto_nib');
            // $client->foto_nib = str_replace('employee/foto_nib', '', $foto_nib_path);
        }
        $client->save();
    
        return redirect('/admin')->with('success', 'Users has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
