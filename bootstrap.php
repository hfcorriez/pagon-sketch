<?php

require __DIR__ . '/vendor/OmniApp/src/OmniApp/App.php';

use OmniApp\App, OmniApp\Route, OmniApp\Log, OmniApp\Event;

define('APPPATH', __DIR__);

App::init(include('config/config.php'));

App::modules(
    array(
        'I18N' => array(
            'lang'  => array('zh-CN'),
            'dir'   => APPPATH . '/langs',
        ),
        'Log'  => array(
            'level' => \OmniApp\Log::LEVEL_DEBUG,
            'dir'   => APPPATH . '/logs',
        )
    )
);

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

Route::on('twig', function()
{
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $twig = new Twig_Environment($loader);
    echo $twig->render('Hello {{ name }}!', array('name' => 'OmniApp'));
});

Event::on(EVENT::SHUTDOWN, function()
{
    function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

    echo '<div style="height: 20px; line-height: 20px; background-color: #ccc; text-align: center">';
    echo 'Copyright (c) 2012 OmniApp Framework';
    echo ' [Memory Usage:' . convert(memory_get_peak_usage(true)) . ']';
    echo ' [Run Time: ' . sprintf('%0.3f', microtime(true) - App::startTime()) . 's]';
    echo '</div>';
});

App::run();