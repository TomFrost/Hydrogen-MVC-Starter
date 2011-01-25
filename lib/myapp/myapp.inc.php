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
require_once(__DIR__ . '/../hydrogen/hydrogen.inc.php');

use hydrogen\common\exceptions\ClassFileNotFoundException;

function load($namespace) {
	while ($namespace[0] === '\\')
		$namespace = substr($namespace, 1);
	if (strpos($namespace, __NAMESPACE__) === 0) {
		$path = __DIR__ . '/' . str_replace('\\', '/', substr($namespace,
			strlen(__NAMESPACE__) + 1)) . '.php';
		set_error_handler('\\' . __NAMESPACE__ . '\fileNotFoundHandler',
			E_WARNING);
		try {
			include_once($path);
		}
		catch (ClassFileNotFoundException $e) {
			restore_error_handler();
			return false;
		}
		restore_error_handler();
		return true;
	}
	return false;
}

function fileNotFoundHandler($errno, $errstr, $errfile, $errline) {
	if (preg_match('/^include_once.*' . __NAMESPACE__ .
			'.*failed to open stream/', $errstr)) {
		throw new ClassFileNotFoundException();
	}
	else {
		$caller = debug_backtrace();
		$caller = $caller[1];
		trigger_error($errstr . ' in <strong>' . $caller['function'] .
			'</strong> called from <strong>' . $caller['file'] . 
			'</strong> on line <strong>' . $caller['line'] .
			"</strong>\n<br />error handler", E_USER_WARNING);
	}
}

spl_autoload_register(__NAMESPACE__ . '\load');

?>