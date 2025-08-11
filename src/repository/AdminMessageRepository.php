<?php

namespace Src\Repository;

use App\Models\Message;
use Src\Repository\Contracts\MessageRepositoryInterface;

class AdminMessageRepository implements MessageRepositoryInterface
{
    public function createMessage(
        int $userId,
        string $name,
        string $email,
        string $message
    ): Message
    {
        return Message::create([
            'user_id' => $userId,  //oturum açmış kullanıcının id sini alır
            'user_name' => $name,
            'user_mail' => $email,
            'message' => $message //formdan gelen mesajı alır
        ]);
    }
}
