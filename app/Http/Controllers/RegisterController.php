<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Competency;
use App\Models\Category;
use App\Models\Education;

class RegisterController extends Controller
{
    public function index(){

        return view('register.index', [
            'title'=> 'Register',
            'active' => 'register',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'phone_number' => ['required','numeric'],
            'email'=> ['required', 'unique:users'],
            'password'=>['required','min:6', 'max:255' ]
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $saved_user = User::create($validatedData);
        //$user_id = $saved_user->id;
        //
        //$validatedData2 = $request->validate([
        //    'category_id' => ['required'],
        //    //'notify_id' => ['required'],
        //    'user_id' => [$user_id],
        //    //'materials_id' => ['required'],
        //    'nisn' => ['required','max:255'],
        //    'tgl_lahir'=>['required'],
        //    'jenis_kelamin' => ['required'],
        //    'nama_ortu'=> ['required', 'max:200'],
        //    'pekerjaan_ortu'=> ['required', 'max:200'],
        //    'alamat' => 'required',
        //    'tingkat_sekolah'=> ['required'],
        //    'asal_sekolah' => ['required', 'max:200'],
        //]);
        //
        //$cek = Student::create($validatedData2);
        ////$request->session()->flash('success', 'Registration successfull! Please Login');
        //return $cek;
        return redirect('/')->with('success', 'Pendaftaran selesai! Silahkan Login!');
    }
}
