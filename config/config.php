<?php

$config = array(
    'classpath' => array(
        ''      => APPPATH . '/src',
        'Twig_' => APPPATH . '/vendor/Twig/lib',
    ),
    'viewpath'  => APPPATH . '/views',
    'error'     => true,
);

$config['route'] = array(
    '404'   => '\Example\Controller\Front\Page404',
    'error' => '\Example\Controller\Front\Page404',

    ''      => '\Example\Controller\Front\Index',
    'debug' => function()
    {
        var_dump(func_get_args());
        var_dump('dd');
    },
);

$config['event'] = array(
    'shutdown' => array(
        function()
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

        },
    ),
);

$config['log'] = array(
    'level' => \OmniApp\Log::LEVEL_DEBUG,
    'dir'   => APPPATH . '/logs',
);

$config['i18n'] = array(
    'lang'  => array('zh-CN'),
    'dir'   => APPPATH . '/langs',
);

return $config;