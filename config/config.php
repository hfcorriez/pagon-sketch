<?php

$config = array(
    'classpath'  => array(
        ''        => APPPATH . '/src',
        'Twig_'   => APPPATH . '/vendor/Twig/lib',
        'OmniApp' => APPPATH . '/vendor/OmniApp/src',
    ),
    'views'      => APPPATH . '/views',
    'error'      => true,
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

$config['event'] = array();

return $config;