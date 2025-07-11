<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(){ //index fonksiyonu tüm verileri listelemek için kullanılır

        //Message tablosundaki tüm verileri veritabanından çeker. SQL de sellect*from sorgusunu döndürür
        $messages = Message::all();

        //meesages değişkeni ile view a gönderir
        return view('messages.index', compact('messages'));

    }
    
}
