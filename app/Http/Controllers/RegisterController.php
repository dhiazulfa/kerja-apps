<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        return view('register.index', [
            'title'=> 'Register',
            'active' => 'register',
            'educations' => Education::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|max:255',
            'education_id' => 'required|integer',
            'nik' => 'required|string|max:255|unique:employees',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'status_pernikahan' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'umur' => 'required|integer',
            'tgl_lahir' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'foto_sertifikat_pengalaman' => 'required|image',
            'foto_ijazah_terakhir' => 'required|image',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'is_admin' => false,
            'role' => 'pekerja',
            'status' => 'inactive',
        ]);

        $employee = Employee::create([
            'user_id' => $user->id,
            'education_id' => $request->input('education_id'),
            'nik' => $request->input('nik'),
            'alamat_ktp' => $request->input('alamat_ktp'),
            'alamat_domisili' => $request->input('alamat_domisili'),
            'status_pernikahan' => $request->input('status_pernikahan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'pengalaman_kerja' => $request->input('pengalaman_kerja'),
            'umur' => $request->input('umur'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'foto_ktp' => $request->file('foto_ktp')->store('employee/foto-ktp'),
            'foto_kk' => $request->file('foto_kk')->store('employee/foto-kk'),
            'foto_sertifikat_pengalaman' => $request->file('foto_sertifikat_pengalaman')->store('employee/foto-sertifikat-pengalaman'),
            'foto_ijazah_terakhir' => $request->file('foto_ijazah_terakhir')->store('employee/foto-ijazah-terakhir'),
            ]);

        return redirect('/')->with('success', 'Pendaftaran selesai! Silahkan Login!');
    }
}
