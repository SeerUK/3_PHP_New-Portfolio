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

	class BlogUI extends TemplateReq
	{

		protected function Root()
		{
			/* Pre-template Setup:
			 * =================== */

				/* Page Number:
				 * ============ */
				$intPageNo = isset( $_GET['page'] ) ? $_GET['page'] : 1;
				if( !preg_match( '/^\d+$/', $intPageNo ) )
				{
					$intPageNo = 1;
				}

			/* Template Setup:
			 * =============== */
			$this->objEngine->caching = false;
			$this->objEngine->Assign( 'strPageTitle',           'Blog' );
			$this->objEngine->Assign( 'arrPrimaryNavigation',   GenericCommon::GetPrimaryNav() );

			$this->objEngine->Display( 'modules/templates/Blog/Root.tpl' );
		}

	}
