<?php
/*
 * Copyright (c) 2009 - 2012, Frosted Design
 * All rights reserved.
 */
namespace myapp\controllers;

use myapp\controllers\ErrorController;
use myapp\models\ArticleModel;
use myapp\models\CommentModel;
use hydrogen\config\Config;
use hydrogen\controller\Controller;
use hydrogen\view\View;

class ArticleController extends Controller {
	
	public function index() {
		// The only time this function will be called is if the user goes to
		// the /article URL without /article/view/.  In this case, let's
		// redirect them to the index.
		header('Location: /');
	}
	
	public function view($postId) {
		// Contact our ArticleModel and ask it for the post.
		$am = ArticleModel::getInstance();
		$post = $am->getArticleCached($postId);
		
		// If the post doesn't exist, we should send this over to the
		// ErrorController to tell the user that this page is not found.
		if (!$post) {
			$ec = ErrorController::getInstance();
			$ec->error404();
		}
		else {
			// The post exists, so let's get the comments and pass it to
			// the article view.
			$cm = CommentModel::getInstance();
			$comments = $cm->getCommentsCached($postId);
			
			View::load('article', array(
				'title' => Config::getRequiredVal('general', 'site_title'),
				'post' => $post,
				'comments' => $comments
			));
		}
	}
	
	/*
	 * These are just the basics, but you'd probably want to add a post()
	 * method here that would add a blog post (if you're writing a blog)
	 * as well.  And unless this is a wiki-style blog, you'd want to make sure
	 * the person calling this function has permission to make a post :)
	 */
}

?>