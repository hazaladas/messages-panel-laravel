<?php

namespace Src\Service;

class UserService extends AbstractService
{

    public function userCreate()
    {
        $userId = $this->getUserId();
    }
}
