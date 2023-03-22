<?php

/**
 * Set up component library autoloading.
 */

require_once dirname(__FILE__) . '/vendor/helsingborg-stad/component-library/source/php/Vendor/Psr4ClassLoader.php';
define('COMPONENTLIBRARY_PATH', __DIR__ . '/vendor/helsingborg-stad/component-library/');
$loader = new \ComponentLibrary\Vendor\Psr4ClassLoader();
$loader->addPrefix('ComponentLibrary', COMPONENTLIBRARY_PATH);
$loader->addPrefix('ComponentLibrary', COMPONENTLIBRARY_PATH . 'source/php/');
$loader->register();
