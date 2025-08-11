<?php

namespace Src\Repository\Contracts;

use App\Models\Message;

interface MessageRepositoryInterface
{
    public function createMessage(
        int $userId,
        string $name,
        string $email,
        string $message
    ): Message;
}
