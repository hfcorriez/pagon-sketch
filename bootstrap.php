<?php

require __DIR__ . '/vendor/OmniApp/src/OmniApp/App.php';

define('APPPATH', __DIR__);

App::init(include('config/config.php'));
App::modules(array('I18N', 'Log'));

Route::on('about', function()
{
    echo 'OmniApp is very simple framework';
});

Route::on('serverinfo', function()
{
    echo '<xmp>';
    print_r($_SERVER);
    Log::debug(var_export($_SERVER, true));
});

Route::on('twig', function(){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $twig = new Twig_Environment($loader);
    echo $twig->render('Hello {{ name }}!', array('name' => 'OmniApp'));
});

App::run();