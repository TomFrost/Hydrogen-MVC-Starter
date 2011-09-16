<?php
/*
 * Copyright (c) 2009 - 2011, Frosted Design
 * All rights reserved.
 *
 * ******
 *
 * An autoloader for 'myapp', adapted from the official Hydrogen autoloader.
 * This file will include the Hydrogen library on its own, so this file should
 * be the only thing necessary to require_once() in your index.php.
 */
namespace myapp;
define('HYDROGEN_AUTOCONFIG_PATH',
	__DIR__ . '/../../config/hydrogen.autoconfig.php');
require_once(__DIR__ . '/../hydrogen/hydrogen.inc.php');

use hydrogen\autoloader\Autoloader;
Autoloader::registerNamespace('myapp', __DIR__);

?>
