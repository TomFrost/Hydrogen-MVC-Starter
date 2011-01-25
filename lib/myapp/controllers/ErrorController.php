<?php
/*
 * Copyright (c) 2009 - 2011, Frosted Design
 * All rights reserved.
 */
namespace myapp\controllers;

use hydrogen\config\Config;
use hydrogen\controller\Controller;
use hydrogen\errorhandler\ErrorHandler;
use hydrogen\view\View;

class ErrorController extends Controller {
	
	public function error404() {
		// Set the 404 header so the browser knows this page doesn't exist
		ErrorHandler::sendHttpCodeHeader(ErrorHandler::HTTP_NOT_FOUND);
		
		// Load our custom 404 page with the site title
		View::load('error404', array(
			'title' => Config::getRequiredVal('general', 'site_title')
		));
	}
}

?>