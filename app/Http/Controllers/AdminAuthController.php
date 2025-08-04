<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller{
    public function showLoginForm(){
        return view ('auth.admin-login');

    }
    public function login(Request $request){
        $request->validate([
            'admin_name' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('name', $request->admin_name)
            ->where('role', 'admin')
            ->first();
        if ($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Geçersiz giriş bilgileri');


    }
}



