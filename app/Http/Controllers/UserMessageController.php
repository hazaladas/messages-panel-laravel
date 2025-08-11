<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Exception\CreateMessageException;
use Src\Trait\MessageServiceTrait;

class UserMessageController extends Controller
{
    use MessageServiceTrait;

    /**
     * @throws CreateMessageException
     */
    public function store(Request $request){
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        try {
            $this->getMessageService()->createMessage(
                Auth::id(),
                Auth::user()->name,
                Auth::user()->email,
                $request->message
            );
        } catch (CreateMessageException $exception) {
            throw new CreateMessageException('Sistemde sorun var sonra dene: ' . $exception->getMessage());
        }

        return redirect()->route('user.dashboard')->with('success','mesajınız gönderildi');
    }

    public function dashboard(){
        $user = Auth::user();
        $messages = $user->messages()->latest()->get();
        return view('user.dashboard', compact('user', 'messages'));
    }
}
