<?php

namespace App\Controller;

use Slim\Container;

class BaseController
{
    // protected $view;
    // protected $logger;
    // protected $flash;
    // protected $em;  // Entities Manager
    // protected $db;
    // protected $emailModel;

    public function __construct(Container $c)
    {
        $this->view = $c->get('view');
        $this->logger = $c->get('logger');
        $this->flash = $c->get('flash');
        $this->em = $c->get('em');
        $this->db_model = $c->get('DBModel');
        $this->emailconfig = $c->get('EmailModel');
        $this->sensor_db_model = $c->get('Sensor_DBModel');

    }

}