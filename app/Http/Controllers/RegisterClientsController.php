<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Client;

class RegisterClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index2', [
            'title'=> 'Register',
            'active' => 'register',
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|max:255',
            'nib' => 'required|string|max:255|unique:clients',
            'alamat' => 'required|string|max:255',
            'kategori_bisnis' => 'required|string|max:255',
            'keterangan_tambahan' => 'required|string|max:255',
            'foto_kantor' => 'required|image',
            'logo' => 'required|image',
            'foto_nib' => 'required|image',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'is_admin' => false,
            'role' => 'penyedia',
            'status' => 'inactive',
        ]);

        $client = Client::create([
            'user_id' => $user->id,
            'nib' => $request->input('nib'),
            'alamat' => $request->input('alamat'),
            'keterangan_tambahan' => $request->input('keterangan_tambahan'),
            'kategori_bisnis' => $request->input('kategori_bisnis'),
            'foto_kantor' => $request->file('foto_kantor')->store('employee/foto_kantor'),
            'logo' => $request->file('logo')->store('employee/logo'),
            'foto_nib' => $request->file('foto_nib')->store('employee/foto_nib'),
            ]);

        return redirect('/')->with('success', 'Pendaftaran selesai! Silahkan Login!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
