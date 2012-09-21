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
			$this->_templateEngine->caching = true;
			$this->_templateEngine->Assign( 'strPageTitle', $errorString );
			$this->_templateEngine->Display( 'Modules/Templates/Error/403.tpl' );
		}

		protected function _404()
		{
			$errorString = '404 Not Found';
			header( 'HTTP/1.1 ' . $errorString );
			$this->_templateEngine->caching = true;
			$this->_templateEngine->Assign( 'strPageTitle', $errorString );
			$this->_templateEngine->Display( 'Modules/Templates/Error/404.tpl' );
		}

	}
