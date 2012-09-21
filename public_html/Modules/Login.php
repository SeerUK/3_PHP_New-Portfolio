<?php

	/**
	 * Login Module
	 *
	 * Any pages related to logging in go in here. Seperate from pages for
	 * when a user is logged in such as account pages.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require_once( 'Handlers/Password.php' );

	class LoginUi extends TemplateAbstract
	{

		protected $_secureFlag = true;

		protected function _home()
		{

			/* Pre-template Setup:
			 * =================== */

				/* Check for login attempt and handle:
				 * =================================== */
				if( isset( $_POST['iptUsername'] ) && isset( $_POST['iptPassword'] ) )
				{
					if( empty( $_POST['iptUsername'] ) || empty( $_POST['iptPassword'] ) )
					{
						$this->_htmlError->setHTMLError( 'error', 'Please fill in both your username and password.' );
					}
					else
					{
						$rememberMe = isset($_POST['iptRemember']) ? ($_POST['iptRemember'] == 'on' ? true : false) : false;

						switch( $this->_sessionHandler->Setup( $_POST['iptUsername'], $_POST['iptPassword'], $rememberMe ) )
						{
							case 'BadRequest':
								$this->_htmlError->setHTMLError( 'error', 'Illegal characters in credentials. Try again.' );
								break;
							case 'BadPassword':
								$this->_htmlError->setHTMLError( 'error', 'Invalid password entered. Try again.' );
								break;
							case 'BadUser':
								$this->_htmlError->setHTMLError( 'error', 'Invalid username entered. Try again.' );
								break;
							case 'OK':
								$this->_htmlError->setHTMLError( 'info', 'Good so far' );
								break;
							default:
								break;
						}
					}
				}

			/* Template Setup:
			 * =============== */
			$this->_templateEngine->Assign( 'arrHTMLErrors', $this->_htmlError->getHTMLErrors() );
			$this->_templateEngine->Assign( 'strPageTitle',  'Login' );
			$this->_templateEngine->Display( 'Modules/Templates/Login/Login.tpl' );
		}

	}
