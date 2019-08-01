<?php
// Routes

$app->get('/post/{id}', 'App\Controller\HomeController:viewPost')
    ->setName('view_post');



$app->get('/', 'App\Controller\HomeController:viewHome')
    ->setName('home');

// ==============sign-up=================
$app->get('/qi/sign-up', 'App\Controller\SignUPViewContoller:view_sign_up')
    ->setName('user_signup');

$app->get('/qi/authorized_user/{authorized_code}', 'App\Controller\SignUPController:user_authorized_process')
    ->setName('authorized_user');

$app->post('/qi/sign-up/process', 'App\Controller\SignUPController:sign_up_process')
    ->setName('sign_up_process');

$app->post('/android/user/sign-up/process', 'App\Controller\SignUPController:mobile_sign_up_process')
    ->setName('android_sign_up_process');

//======================================

// ==============sign-in=================
$app->get('/qi/sign-in', 'App\Controller\SignInController:view_sign_in')
    ->setName('user_signin');

$app->post('/qi/sign-in/process', 'App\Controller\SignInController:sign_in_process')
    ->setName('user_signin');

$app->post('/android/user/sign-in/process/', 'App\Controller\SignInController:android_sign_in_process')
    ->setName('android_user_signin');
//======================================


// ==============Sign-out=================
$app->post('/qi/user/sign-out/process', 'App\Controller\SignOutController:sign_out_process')
    ->setName('sign_out_process');
//======================================


// ==============Forgotten PW=================

$app->get('/qi/user/forgotten_password', 'App\Controller\ForgottenPWController:forgottenPW_view')
    ->setName('user_forgotten_password');

$app->get('/qi/user/forgotten_password/process', 'App\Controller\ForgottenPWController:forgotten_password_process')
    ->setName('user_forgotten_password');
//======================================


// ==============SensorManagement=================
$app->post('/qi/device/aq_record', 'App\Controller\SensorManagement:airQuality_record')
    ->setName('airQuality_record');

$app->post('/qi/device/registrate_process', 'App\Controller\SensorManagement:sensor_registration_process')
    ->setName('airQuality_record');

$app->post('/qi/device/list_view', 'App\Controller\SensorManagement:device_list_view_process')
    ->setName('list_view');
//======================================