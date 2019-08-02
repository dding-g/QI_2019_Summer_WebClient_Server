<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Register component on container


// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};





// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// PDO database library
$container['db'] = function ($c) {
    $db = $c['settings']['dbSettings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


// email setting
$container['email'] = function ($c) {
    $emailconfig = array(
                          'host' => $c['settings']['emailSetting']['host'],
                          'pw' => $c['settings']['emailSetting']['password'],
                          'port' =>  $c['settings']['emailSetting']['port'],
                        );

    return $emailconfig;
};


// doctrine EntityManager
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};


// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Controller factories
// -----------------------------------------------------------------------------

$container['App\Controller\HomeController'] = function ($c) {
    return new App\Controller\HomeController($c);
};

$container['App\Controller\SignUPController'] = function ($c) {
    return new App\Controller\SignUPController($c);
};

$container['App\Controller\SignInController'] = function ($c) {
    $logger = $c->get('logger');
    $DBModel = $c->get('DBModel');
    $emailModel = $c->get('EmailModel');

    return new App\Controller\SignInController($c);
};

$container['App\Controller\MypageController'] = function ($c) {
    return new App\Controller\MypageController($c);
};

$container['App\Controller\SensorManagement'] = function ($c) {
    $Sensor_DBModel = $c->get('Sensor_DBModel');
    return new App\Controller\SensorManagement($c);
};



// -----------------------------------------------------------------------------
// Model factories
// -----------------------------------------------------------------------------
$container['DBModel'] = function ($c) {
    $settings = $c->get('settings');
    $DBModel = new App\Model\DBModel($c->get('db'));
    return $DBModel;
};

$container['Sensor_DBModel'] = function ($c) {
    $settings = $c->get('settings');
    $Sensor_DBModel = new App\Model\Sensor_DBModel($c->get('db'));
    return $Sensor_DBModel;
};

$container['EmailModel'] = function ($c) {
    $settings = $c->get('settings');
    $emailModel = new App\Model\EmailModel($c->get('email'));
    return $emailModel;
};
