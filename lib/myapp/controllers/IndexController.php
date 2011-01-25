<?php
/*
 * Copyright (c) 2009 - 2011, Frosted Design
 * All rights reserved.
 */
namespace myapp\controllers;

use myapp\models\ArticleModel;
use hydrogen\config\Config;
use hydrogen\controller\Controller;
use hydrogen\view\View;

class IndexController extends Controller {
	
	const ARTICLES_PER_PAGE = 10;
	
	public function index($page=1) {
		// Calculate which blog post we should start with, based on the page.
		$start = ($page - 1) * self::ARTICLES_PER_PAGE;
		
		// Contact our ArticleModel and ask it for a summary of a set of posts.
		$am = ArticleModel::getInstance();
		$posts = $am->getSummaryCached($start, self::ARTICLES_PER_PAGE);
		
		// Pass this data, as well as some other necessities, to the view.
		View::load('index', array(
			'title' => Config::getRequiredVal('general', 'site_title'),
			'posts' => $posts
		));
	}
}

?>