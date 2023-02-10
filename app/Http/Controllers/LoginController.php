<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        
        return view('login.index', [
            'title' => 'Login',
            'active'=> 'login'
        ]);
    }

    //Function login Users
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
    
            if ($user->is_admin && $user->status == 'active' || $user->role == 'penyedia' && $user->status == 'active') {
                return redirect('/admin');
            } elseif ($user->role == 'pekerja' && $user->status == 'active') {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('success', 'Akun anda belum aktif');
            }
        }
    
        return back()->with('loginError', 'Login failed!');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'exists:users,' . $this->username() . ',status', 'active',
            'password' => 'required|string',
        ], [
            $this->username() . '.exists' => 'User is not active.'
        ]);

        Alert::success('Success Login');
    }


    //Function logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
