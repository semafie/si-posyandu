<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class login_registerController extends Controller
{


    public function __construct()
        {

        $ownerEmail = 'owner@gmail.com';
        $adminEmail = 'admin@gmail.com';
    
        $ownerUser = User::where('email', $ownerEmail)->first();
        $adminUser = User::where('email', $ownerEmail)->first();
        
        
        if (!$ownerUser) {
            User::create([
                'name' => 'owner',
                'email' => $ownerEmail,
                'password' => Hash::make('owner123'),
                'role' => 'owner',
            ]);
        }
        if (!$adminUser) {
            User::create([
                'name' => 'admin',
                'email' => $adminEmail,
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }

    }


    public function show_login(){
        return view('login_register.login');
    }

    public function loginakun(Request $request) {

        dd($request->all());
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password'); // Hanya ambil email dan password
    
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            
            
            if (Auth::user()->role == 'admin') {

                return redirect()->intended('admin/dashboard')->with(Session::flash('success_message', true));
                
            }elseif(Auth::user()->role == 'owner'){
                return redirect()->intended('admin_kepala/dashboard')->with(Session::flash('success_message', true));
            }

        } else {
            return redirect()->back()->with('error')->with(Session::flash('gagal_login', true));
            // Autentikasi gagal
            // Lakukan sesuatu
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }
}
