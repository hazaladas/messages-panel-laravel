<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //giriş formunu gönderir
    public function showLoginForm(){
        return view('user.login');
    }

    //giriş işlemşnş yapar
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors([
            'email' => 'giris bilgileri hatalı',
        ]);
    }
    //çıkış 
    public function logout(){
        Auth::guard('web')->logout(); //kullanıcının çıkış yapmasını oturumunu kapatmasını sağlar
        return redirect()->route('user.login'); //login sayfasına gönderir 
    }

}
