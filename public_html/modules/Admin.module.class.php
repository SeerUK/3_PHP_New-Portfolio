<?php

	/**
	 * Admin Module
	 *
	 * Sets up administrative pages, only allow access to users who have
	 * permissions!
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since   [v0.1-alpha]
	 *
	 */

	require_once( 'classes/Common.class.php' );
	require_once( 'classes/Admin.class.php' );

	class AdminUI extends TemplateReq
	{

		public function Root()
		{
			/* Pre-template setup:
			 * =================== */

			/**
			 * @todo Require authentication here.
			 */

			/* Template Setup
			 * ============== */
			$this->objEngine->caching = true;

			$this->objEngine->Display( 'modules/templates/Admin/Root.tpl' );
		}

	}
