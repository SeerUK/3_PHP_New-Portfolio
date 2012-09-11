<?php

	/**
	 * Blog Module
	 *
	 * Handles all of the blog pages (duh)
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since   [v0.1-alpha]
	 *
	 */

	require_once( 'classes/Common.class.php' );
	require_once( 'handlers/blog.handler.php' );

	class BlogUI extends TemplateReq
	{

		protected function Root()
		{
			/* Pre-template Setup:
			 * =================== */

				/* Validate Page Number:
				 * ===================== */
				$intPageNo = isset( $_GET['page'] ) ? $_GET['page'] : 1;
				if( !preg_match( '/^\d+$/', $intPageNo ) )
				{
					$intPageNo = 1;
				}

				/* Get Blog Entries:
				 * ================= */
				$arrBlogEntries = BlogHandler::getBlogEntries( $intPageNo, 5 );

				/* Format Blog Dates:
				 * ================== */
				for( $i = 0; $i < count( $arrBlogEntries ); $i = $i + 1 )
				{
					$stmDate = strtotime( $arrBlogEntries[$i]['stmTimestamp'] );
					$arrBlogEntries[$i]['date'] = getDate( $stmDate );
				}

			/* Template Setup:
			 * =============== */
			$this->objEngine->caching = false;
			$this->objEngine->Assign( 'strPageTitle',           'Blog' );
			$this->objEngine->Assign( 'arrBlogEntries',         $arrBlogEntries );
			$this->objEngine->Assign( 'arrPrimaryNavigation',   GenericCommon::getPrimaryNav() );

			$this->objEngine->Display( 'modules/templates/Blog/Root.tpl' );
		}

	}
