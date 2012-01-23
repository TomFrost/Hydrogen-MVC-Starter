<?php
/*
 * Copyright (c) 2009 - 2012, Frosted Design
 * All rights reserved.
 */
namespace myapp\models;

use hydrogen\model\Model;

class CommentModel extends Model {
	
	/**
	 * Gets the comments for a particular blog post.  If you call
	 * getComments() directly, you'll get a fresh copy of the comments.  But
	 * call getCommentsCached(), and you'll get a resource-friendly cached
	 * version of the comments.  They'll be cached for 1200 seconds
	 * (20 minutes) and added to the 'comments' group so that you can expire
	 * ALL cached comments simultaneously.  This is useful if you ban a
	 * commenter or delete all of his comments and need to update that change
	 * site-wide.
	 */
	public function getComments__1200_comments($postId) {
		// Returning sample data here, for simplicity's sake.  Normally this
		// would be a Query or SQLBeans call to get the data from a database.
		switch ($postId) {
			case 1:
				return array(
					array(
						'name' => 'Ted Mosby',
						'timestamp' => 'Jan 12 2011 10:10am GMT-5',
						'post' => 'Congrats on your first post!'
					),
					array(
						'name' => 'Barney Stinson',
						'timestamp' => 'Jan 12 2011 11:08am GMT-5',
						'post' => 'My blog is better.'
					)
				);
			case 2:
				return array(
					array(
						'name' => 'Robin Sparkles',
						'timestamp' => 'Jan 24 2011 8:27pm GMT-5',
						'post' => 'Glad you thought aboot posting again, ey?'
					),
					array(
						'name' => 'Barney Stinson',
						'timestamp' => 'Jan 24 2011 8:29pm GMT-5',
						'post' => 'My blog is STILL better.'
					)
				);
		}
		return array();
	}
}

?>