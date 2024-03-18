<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }

    public function registerpage(){
        return view('user.register');
    }

    public function register(Request $request){
        $request->validate([
            'username' => 'required| min:5',
            'password' => 'required|min:7',
            'email' => 'required | email:dns',
            'nama' => 'required | min:3',
            'alamat' => 'required'
        ]);

        $item = new User();

        $item->username = $request->username;
        $item->password = Hash::make($request->password);
        $item->email = $request->email;
        $item->nama = $request->nama;
        $item->alamat = $request->alamat;
        if($request->file('foto')){
            $image = $request->file('foto');
            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/storage/user', $filename);
            $item->foto = $filename;
        }
        $item->save();
        return route('loginpage');
    }

    public function loginpage(){
        return view('user.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required | email:dns',
            'password' => 'required|min:7',
        ]);

        if (Auth::guard('web')->attempt($data)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/buku');
        }

        return back()->with('loginError', 'Gagal Login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function uprolepage(){
        return view('user.uprole');
    }
    
    public function uprole(){
        $iduser = Auth::id();
        $user = User::find($iduser);
        $user->role = 'Gold';
        $user->save();
        return redirect(route('buku.index'));
    }
}
