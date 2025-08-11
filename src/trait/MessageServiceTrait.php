<?php

namespace Src\Trait;

use Src\Service\MessageService;

trait MessageServiceTrait
{
    private MessageService $messageService;

    public function getMessageService(): MessageService
    {
        if (isset($this->messageService)) {
            return $this->messageService;
        }

        $this->messageService = new MessageService();
        return $this->messageService;
    }
}
