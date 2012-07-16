<?php

namespace Example\Controller;

class Front extends \OmniApp\Controller
{
    /**
     * @var \OmniApp\View
     */
    protected $_body;
    /**
     * @var \OmniApp\Request
     */
    protected $_request;
    /**
     * @var \OmniApp\Response
     */
    protected $_response;

    public function __construct()
    {
        //doing something before run
    }

    public function run()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->{$method}();
    }

    public function before()
    {
        //doing something after run
    }

    public function after()
    {
        echo $this->_body;
    }
}