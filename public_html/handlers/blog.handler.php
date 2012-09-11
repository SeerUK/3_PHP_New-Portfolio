<?php

	/**
	 * Blog Handler
	 *
	 * Handles the various functions of the blog section of the portfolio.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since   [v0.1-alpha]
	 *
	 */

	class BlogHandler
	{

		public static function getBlogEntries( $intPageNo, $intPerPage )
		{
			$strQuery = 'SELECT strBlogTitle '.
			                 ', strBlogSubtitle '.
			                 ', strContent '.
			                 ', stmTimestamp '.
			              'FROM tblBlogEntry '.
			          'ORDER BY stmTimestamp DESC ';

			/* Calculate limits for pages:
			 * =========================== */
			$intUpperLimit = $intPageNo * $intPerPage;
			$intLowerLimit = $intUpperLimit - $intPerPage;

			$strQuery.=  "LIMIT $intLowerLimit, $intUpperLimit";

			return DbHandler::FetchAll( $strQuery );
		}

	}