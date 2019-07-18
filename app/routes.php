<?php
// Routes

$app->get('/', 'App\Controller\HomeController:dispatch')
    ->setName('homepage');

$app->get('/post/{id}', 'App\Controller\HomeController:viewPost')
    ->setName('view_post');



$app->get('/qi/signin', 'App\Controller\UserController:signin')
    ->setName('usersignin');

$app->get('/qi/home', 'App\Controller\HomeController:viewHome')
    ->setName('usersignin');

$app->get('/qi/sign-up', 'App\Controller\SignUPController:view_sign_up')
    ->setName('usersignin');

$app->post('/qi/sign-up/process', 'App\Controller\SignUPController:sign_up_process')
    ->setName('sign_up_process');

$app->get('/qi/sign-in', 'App\Controller\SignInController:view_sign_in')
    ->setName('usersignin');
