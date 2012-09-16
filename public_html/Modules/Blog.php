<?php

	/**
	 * Blog Module
	 *
	 * Handles all of the blog pages (duh)
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require_once( 'Handlers/Blog.php' );


	class BlogUI extends TemplateAbstract
	{

		protected function _home()
		{

			/* Pre-template Setup:
			 * =================== */

				/* Validate Page Number:
				 * ===================== */
				$pageNo = isset( $_GET['page'] ) ? $_GET['page'] : 1;
				if( !preg_match( '/^\d+$/', $pageNo ) )
				{
					$pageNo = 1;
				}

				/* Get Blog Entries:
				 * ================= */
				$blogEntries = BlogHandler::getBlogEntries( $pageNo, 5 );

				/* Format Blog Dates:
				 * ================== */
				for( $i = 0; $i < count( $blogEntries ); $i = $i + 1 )
				{
					$date = strtotime( $blogEntries[$i]['stmCreated'] );
					$blogEntries[$i]['date'] = getDate( $date );
				}

			/* Template Setup:
			 * =============== */
			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle',           'Blog' );
			$this->_templateEngine->Assign( 'arrBlogEntries',         $blogEntries );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation',   Common::getPrimaryNav() );
			$this->_templateEngine->Display( 'Modules/Templates/Blog/Root.tpl' );
		}

	}
