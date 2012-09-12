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
				if( isset( $_POST['iptUsername'] ) && isset( $_POST['iptPassword'] ) )
				{
					if( empty( $_POST['iptUsername'] ) || empty( $_POST['iptPassword'] ) )
					{
						$this->objHtmlErrors->setHTMLError( 'error', 'Please fill in both your username and password.' );
					}
					else
					{
						$bolRemember = isset($_POST['iptRemember']) ? ($_POST['iptRemember'] == 'on' ? true : false) : false;

						switch( $this->objSessionsHandler->Setup( $_POST['iptUsername'], $_POST['iptPassword'], $bolRemember ) )
						{
							case 'BadPassword':
								$this->objHtmlErrors->setHTMLError( 'error', 'Invalid password entered.' );
								break;
							case 'BadUser':
								$this->objHtmlErrors->setHTMLError( 'error', 'Invalid username entered.' );
								break;
							case 'GoodRequest':
								$this->objHtmlErrors->setHTMLError( 'info', 'Good so far' );
								break;
							default:
								break;
						}
					}
				}

			/* Template Setup:
			 * =============== */
			$this->objEngine->Assign( 'arrHTMLErrors',          $this->objHtmlErrors->getHTMLErrors() );
			$this->objEngine->Assign( 'strPageTitle',           'Login');

			$this->objEngine->Display( 'modules/templates/Login/Login.tpl' );
		}

	}
