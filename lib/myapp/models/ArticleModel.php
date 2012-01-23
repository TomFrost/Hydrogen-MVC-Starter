<?php
/*
 * Copyright (c) 2009 - 2012, Frosted Design
 * All rights reserved.
 */
namespace myapp\models;

use hydrogen\model\Model;

class ArticleModel extends Model {
	
	/**
	 * Gets summaries of a set o blog posts.  See the crazy-looking function
	 * name, here?  This is the magic of Hydrogen in action.  You can call
	 * getSummary() to get the summaries fresh from the app, OR you can call
	 * getSummaryCached() to get a much more resource-friendly cached version.
	 * It will stay in the cache for 600 seconds, and add itself to the group
	 * called "summaries" so that, if you need to, you can expire all the
	 * cached summaries so far.  This is useful if you make a new post and need
	 * all the index pages to update right away.
	 */
	public function getSummary__600_summaries($start, $perPage) {
		// Normally we'd either create a new Query object or
		// access an SQLBean here to get results from the database,
		// but since this is more of a template for doing your own
		// thing, we'll just return sample data.
		return array(
			array(
				'id' => 2,
				'title' => 'I\'m back!',
				'author' => 'Talented Hydrogen Developer',
				'timestamp' => '24 Jan 2011 7:55pm GMT-5',
				'body' => 'Time for another post!'
			),
			array(
				'id' => 1,
				'title' => 'Hello, world!',
				'author' => 'Talented Hydrogen Developer',
				'timestamp' => '11 Jan 2011 9:35am GMT-5',
				'body' => 'This is my first post on a totally fake blog!'
			)
		);
	}
	
	/**
	 * Gets the full article requested.  Again, note that we're caching-- this
	 * time for 1200 seconds, or 20 minutes.  No need to add this to a group,
	 * since there's probably no reason we'd ever need to expire all of the
	 * individually cached blog posts.
	 */
	public function getArticle__1200($postId) {
		// More example data here.  Replace this with database access if you
		// want to make your own blog :)
		switch ($postId) {
			case 1:
				return array(
					'id' => 1,
					'title' => 'Hello, world!',
					'author' => 'Talented Hydrogen Developer',
					'timestamp' => '11 Jan 2011 9:35am GMT-5',
					'body' => 'This is my first post on a totally fake blog! I
						hope you like it, because I typed these two sentences
						for a reaaallly long time.'
				);
			case 2:
				return array(
					'id' => 2,
					'title' => 'I\'m back!',
					'author' => 'Talented Hydrogen Developer',
					'timestamp' => '24 Jan 2011 7:55pm GMT-5',
					'body' => 'Time for another post!  And it\'s just as
						exciting as the first!'
				);
		}
		return false;
	}
}

?>