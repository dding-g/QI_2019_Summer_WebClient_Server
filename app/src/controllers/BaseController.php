<?php

namespace App\Controller;

use Slim\Container;
class BaseController
{
    protected $view;
    protected $logger;
    protected $flash;
    protected $em;  // Entities Manager

    public function __construct(Container $c)
    {
        $this->view = $c->get('view');
        $this->logger = $c->get('logger');
        $this->flash = $c->get('flash');
        $this->em = $c->get('em');
    }

    public function __construct($logger, $testModel, $emailModel)
    {
        $this->logger = $logger;
        $this->test = $testModel;
        $this->emailconfig = $emailModel;
    }
}