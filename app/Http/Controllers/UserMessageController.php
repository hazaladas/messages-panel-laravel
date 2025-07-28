<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class UserMessageController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        Message::create([
            'user_id' => Auth::id(),  //oturum açmış kullanıcının id sini alır 
            'user_name' => Auth::user()->name,
            'user_mail' => Auth::user()->email,
            
            'message' => $request->message  //formdan gelen mesajı alır
        ]);

        return redirect()->route('user.dashboard')->with('success','mesajınız gönderildi');

    }
}
