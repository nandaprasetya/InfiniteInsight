<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin/login');
    }
    public function create(){
        return view('admin/form');
    }
    public function store(Request $request){
        $item = new Admin();
        $this->creup($request,$item,'post');
        return redirect(route('admin.login.page'));
    }

    public function creup(Request $request, $item, $pagetype){
        $request->validate([
            'username' => 'required| min:5',
            'password' => 'required|min:7',
            'email' => 'required | email:dns',
            'nama' => 'required | min:3',
        ]);


        $item->username = $request->username;
        $item->password = Hash::make($request->password);
        $item->email = $request->email;
        $item->nama = $request->nama;
        if($request->file('foto')){
            $image = $request->file('foto');
            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/storage/admin', $filename);
            $item->foto = $filename;
        }
        $item->save();
    }

    public function loginpage(){
        return view('admin.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required | email:dns',
            'password' => 'required|min:7',
        ]);

        if (Auth::guard('admin')->attempt($data)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Gagal Login');
    }
}
