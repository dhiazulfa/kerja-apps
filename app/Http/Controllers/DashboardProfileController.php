<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class DashboardProfileController extends Controller
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
    public function edit(User $user)
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        return view('pekerja.profile.edit', [
            'user' => $user,
            'employee' => $employee
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
            'nik' => 'required|numeric',
            'umur' => 'required|numeric',
            'tgl_lahir' => 'required',
            'alamat_domisili' => 'required|string',
            'alamat_ktp' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_ijazah_terakhir' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_sertifikat_pengalaman' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->save();
        
        $employee = Employee::where('user_id', $user->id)->first();
        $employee->nik = $request->input('nik');
        $employee->umur = $request->input('umur');
        $employee->tgl_lahir = $request->input('tgl_lahir');
        $employee->alamat_domisili = $request->input('alamat_domisili');
        $employee->alamat_ktp = $request->input('alamat_ktp');
        $employee->pengalaman_kerja = $request->input('pengalaman_kerja');
        if ($request->has('foto_ktp')) {
            $foto_ktp = $request->file('foto_ktp');
            $foto_ktp_path = $foto_ktp->store('employee/foto_ktp');
            // $client->logo = str_replace('employee/logo', '', $logo_path);
        }
        if ($request->has('foto_kk')) {
            $foto_kk = $request->file('foto_kk');
            $foto_kk_path = $foto_kk->store('employee/foto_kk');
            // $client->foto_kantor = str_replace('employee/foto_kantor', '', $foto_kantor_path);
        }
        if ($request->has('foto_ijazah_terakhir')) {
            $foto_ijazah_terakhir = $request->file('foto_ijazah_terakhir');
            $foto_ijazah_terakhir_path = $foto_ijazah_terakhir->store('employee/foto_ijazah_terakhir');
            // $client->foto_nib = str_replace('employee/foto_nib', '', $foto_nib_path);
        }
        if ($request->has('foto_sertifikat_pengalaman')) {
            $foto_sertifikat_pengalaman = $request->file('foto_sertifikat_pengalaman');
            $foto_sertifikat_pengalaman_path = $foto_sertifikat_pengalaman->store('employee/foto_sertifikat_pengalaman');
            // $client->foto_nib = str_replace('employee/foto_nib', '', $foto_nib_path);
        }
        $employee->save();
    
        return redirect('/dashboard')->with('success', 'Users has been updated!');
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
