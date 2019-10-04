<?php

namespace App\Services;

use Symfony\Component\Security\Core\Security;

class CheckConnectionManager
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function checkConnection()
    {
        if ($this->security->getUser()) {
            return $this->security->getUser()->getUsername();
        } else {
            die();
        }
    }
}
