<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(Request $request){ //index fonksiyonu tüm verileri listelemek için kullanılır. requeste göre listeler 

          //Message tablosundaki tüm verileri veritabanından çeker. SQL de sellect*from sorgusunu döndürür
        //$messages = Message::all();

          //meesages değişkeni ile view a gönderir
        //return view('messages.index', compact('messages'));

       $query = message::query(); 

       //search parametresi varsa filtreleme yap
       if($request->has('search') && $request->search != ''){
        $search = $request->input('search');

        $query->where(function ($q) use ($search){
            $q->where('user_name', 'like', "%{$search}%")
            ->orWhere('user_mail', 'like', "%{$search}%")
            ->orWhere('message', 'like', "%{$search}%"); 
        });
       }

       //okundu bilgisini filtreleme 
       if($request->has('filter') && $request->filter != '') {
            if($request->filter === 'read'){
                $query->where('is_read', true);
            }
            elseif($request->filter ==='unread'){
                $query->where('is_read', false);
            }

       }

       //sıralama
       $allowedSorts = ['id', 'user_name', 'user_mail', 'message', 'created_at'];
       $sort = $request->input('sort');
       $direction = $request->input('direction', 'asc');

       if ($sort && in_array($sort, $allowedSorts)) {
           $query->orderBy($sort, $direction);
       }

       //sayfalama
       $messages = $query->paginate(10); // her sayfada 10 mesaj gösteerir
       return view('messages.index', compact('messages'));

       //sorguya göre mesajları getirme
       $messages = $query->get();
       //view a gönderiri
       return view('messages.index', compact('messages'));


    }

    public function toggleRead($id){
        //ilk baş ilgili mesajı veritabanından id ile bul
        $message = Message::FindOrFail($id); //eğer id yoksa 404 hata verir
        //ikinci mevcut is_read değerini tersinde çevirir 
        $message->is_read = !$message->is_read;
        //değişikliği kaydeder
        $message->save();
        //sayfaya geri döner
        return redirect()->back()->with('success', 'okundu bilgisi güncellendi');
    }

    public function show($id){
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }
    
}
