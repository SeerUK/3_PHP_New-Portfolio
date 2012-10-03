<?php

	/**
	 * Error Module
	 *
	 * Contains all of the error page UI setup. Defaults are specified in the
	 * template handler.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since    0.1-alpha
	 *
	 */

	class ErrorUi extends TemplateAbstract
	{

		protected function _403()
		{
			$errorString = '403 Forbidden';
			header( 'HTTP/1.1 ' . $errorString );

			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle', $errorString );
			$this->_templateEngine->Assign( 'errorString', $errorString );
			$this->_templateEngine->Assign( 'errorSubString', 'Try again...' );
			$this->_templateEngine->Assign( 'errorMessage', "
				<p>It looks like you don't have permission to be here!</p>
				<p>It could just be that you need to be logged in to view this page and you aren't! Go back and try again. If you still can't access the page you really shouldn't be here!</p>
			");
			$this->_templateEngine->Display( 'Modules/Templates/Error/http.tpl' );
		}

		protected function _404()
		{
			$errorString = '404 Not Found';
			header( 'HTTP/1.1 ' . $errorString );

			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle', $errorString );
			$this->_templateEngine->Assign( 'errorString', $errorString );
			$this->_templateEngine->Assign( 'errorSubString', 'Sorry about that!' );
			$this->_templateEngine->Assign( 'errorMessage', "
				<p>Unfortunately the page you were looking for couldn't be found!</p>
				<p>Try go back, retrace your steps and see if you can find the right place. If you still run into problems then feel free to email me.</p>
			");
			$this->_templateEngine->Display( 'Templates/Modules/Error/Http.tpl' );
		}

	}
