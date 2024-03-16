<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function loginpage(){
        return view('admin.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required | email:dns',
            'password' => 'required|min:7',
        ]);

        $user = DB::select("select * from users where email = ?", [$data['email']]);

        if (isset($user[0]) && $user[0]->role == 'admin'){
            if (Auth::guard('web')->attempt($data)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Gagal Login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
