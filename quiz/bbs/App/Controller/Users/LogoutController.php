<?php

namespace bbs\App\Controller;

use bbs\App\Controller\BaseController;

class LogoutController extends BaseController
{
    public function logOut(): void
    {
        session_destroy();
        $this->redirect('');
    }
}
