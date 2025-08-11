<?php

namespace Src\Service;

use App\Models\Message;
use Src\Repository\MessageRepository;

class MessageService extends AbstractService
{
    public function createMessage(
        int $userId,
        string $name,
        string $email,
        string $message
    ): Message
    {
        $messageRepository = new MessageRepository();
        $userId = $this->getUserId();
        return $messageRepository->createMessage(
            $userId,
            $name,
            $email,
            $message
        );
    }
}
