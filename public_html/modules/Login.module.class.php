<?php

	/**
	 * Login Module
	 *
	 * Any pages related to logging in go in here. Seperate from pages for
	 * when a user is logged in such as account pages.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since 	[v0.1-alpha]
	 *
	 */

	require_once( 'classes/Common.class.php' );
	require_once( 'handlers/password.handler.php' );

	/**
	 * Main Login Class
	 */
	class LoginUI extends TemplateReq
	{

		//----------------------------------------------------------------------
		// Begin build functions:
		//----------------------------------------------------------------------

		/**
		 * @invoke      DoLogin
		 *
		 * @desc        Login page for all areas of the website. Authentication
		 *              is page specific.
		 */
		protected function Login()
		{

			/* Template Setup:
			 * =============== */
			$this->objEngine->caching = true;

			$arrHTMLErrors = array();

			/* Show error messages:
			 * ==================== */
			if(isset($_POST['iptUsername']) && isset($_POST['iptPassword']))
			{
				$arrHTMLErrors[] = GenericCommon::getHTMLError(
					'error',
					'< Message >'
				);
			}

			$this->objEngine->Assign( 'strErrors',				$arrHTMLErrors );
			$this->objEngine->Assign( 'strPageTitle',           'Login');

			$this->objEngine->Display( 'modules/templates/Login/Login.tpl' );
		}

	}
