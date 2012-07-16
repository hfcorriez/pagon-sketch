<?php

namespace Example\Controller\Front;

class Index extends \Example\Controller\Front
{
    public function get()
    {
        $this->_body = new \OmniApp\View('index');
        $this->_body->set(array('version' => \OmniApp\VERSION));
    }
}