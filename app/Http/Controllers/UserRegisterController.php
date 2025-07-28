<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserRegisterController extends Controller
{
    public function showRegisterForm(){
        return view('register');
    }

    
    public function register(Request $request){
        // doğrulama işlemi 
        $request->validate([ //formdan gelen verileri kontrol eder (validation) 
            'name' => 'required|string|max:200',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);
        //kullanıcı oluşturma 
        User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login')->with('success');
    }
}
