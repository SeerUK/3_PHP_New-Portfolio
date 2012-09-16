<?php

	/**
	 * Blog Handler
	 *
	 * Handles the various functions of the blog section of the portfolio.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	class BlogHandler
	{

		public static function getBlogEntries( $pageNo, $perPage )
		{
			$query = 'SELECT strBlogTitle '.
			              ', strBlogSubtitle '.
			              ', strContent '.
			              ', stmCreated '.
			           'FROM ' . DB_MAIN . '.tblBlogEntry '.
			       'ORDER BY stmTimestamp DESC ';

			/* Calculate limits for pages:
			 * =========================== */
			$upperLimit = $pageNo * $perPage;
			$lowerLimit = $upperLimit - $perPage;

			$query.=  "LIMIT $lowerLimit, $upperLimit";

			return DbHandler::fetchAll( $query );
		}

	}