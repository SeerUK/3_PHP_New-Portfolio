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

	class LoginUI extends TemplateReq
	{

		protected function Login()
		{

			/* Pre-template Setup:
			 * =================== */

				/* Show error messages:
				 * ==================== */
				$arrHTMLErrors = array();
				if(isset($_POST['iptUsername']) && isset($_POST['iptPassword']))
				{
					$this->objHtmlErrors->setHTMLError( 'info', 'Congratulations, you just submitted the form.' );
				}

			/* Template Setup:
			 * =============== */
			$this->objEngine->Assign( 'arrHTMLErrors',          $this->objHtmlErrors->getHTMLErrors() );
			$this->objEngine->Assign( 'strPageTitle',           'Login');

			$this->objEngine->Display( 'modules/templates/Login/Login.tpl' );
		}

	}
