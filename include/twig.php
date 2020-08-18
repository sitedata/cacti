<?php

$guitemplate = 'cacti';

spl_autoload_register(function ($classname) {
    $dirs = array (
        __DIR__ . '/vendor/Twig/',
        __DIR__ . '/vendor/Umpirsky/'
    );

    foreach ($dirs as $dir) {
        $filename = $dir . str_replace('\\', '/', $classname) .'.php';
        if (file_exists($filename)) {
            require_once $filename;
            break;
        }
    }

});

$twigarr = array('config' => $config);

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates/' . $guitemplate);
$twig = new \Twig\Environment($loader, array('debug' => true));
$twig->addExtension(new Umpirsky\Twig\Extension\PhpFunctionExtension(
		array( '__',
			'__esc',
			'html_escape',
			'html_common_header',
			'get_current_page',
			'cacti_sizeof'
		)
	));


