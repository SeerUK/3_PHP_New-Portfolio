<?php

	/**
	 * Admin Module
	 *
	 * Sets up administrative pages, only allow access to users who have
	 * permissions!
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require_once( 'Classes/Admin.php' );


	class AdminUI extends TemplateAbstract
	{

		protected function _root()
		{
			/* Pre-template setup:
			 * =================== */

			/**
			 * @todo Require authentication here.
			 */

			/* Template Setup
			 * ============== */
			$this->objEngine->caching = true;

			$this->objEngine->Display( 'Modules/Templates/Admin/Root.tpl' );
		}

	}
