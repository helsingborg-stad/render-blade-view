<?php

/**
 * Set up component library autoloading.
 */
define('COMPONENTLIBRARY_PATH', __DIR__ . '/vendor/helsingborg-stad/component-library/');
require_once __DIR__ . '/vendor/helsingborg-stad/component-library/source/php/vendor/Psr4ClassLoader.php';
$loader = new \ComponentLibrary\Vendor\Psr4ClassLoader();
$loader->addPrefix('ComponentLibrary', COMPONENTLIBRARY_PATH);
$loader->addPrefix('ComponentLibrary', COMPONENTLIBRARY_PATH . 'source/php/');
$loader->register();