<?php

	/**
	 * Template Handler
	 *
	 * Handles preparation of template files based upon the URL and sets up the
	 * page using the template engine specified above.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since 	[v0.1-alpha]
	 *
	 */

	require_once( 'template.libs/Smarty.class.php' );
	require_once( 'sessions.handler.php' );
	require_once( 'auth.handler.php' );
	require_once( 'feed.handler.php' );

	class TemplateHandler
	{

		/**
		 * Module from GET request
		 * @var [string]
		 */
		public $strModule;

		/**
		 * Invoke from GET request
		 * @var [string]
		 */
		public $strInvoke;

		/**
		 * Template system instance object
		 * @var [object]
		 */
		public $objInstance;


		/**
		 * TemplateHandler constructor sets up page loading through the
		 * template system.
		 */
		public function __construct()
		{

			$this->ValidateURI();

		}

		/**
		 * Returns current template handler, must be the name of the main class
		 * for the template system.
		 */
		public static function GetHandler()
		{
			return 'Smarty';
		}

		/**
		 * Redirects the user to an appropriate error page based on the error
		 * code given.
		 * @param [integer] $intErrCode [HTTP error code to display page for]
		 */
		public static function HTTPError($intErrCode)
		{
			switch($intErrCode)
			{
				case 404:
				default:
					header( 'Location: ' . ROOT . '?module=Error&invoke=' . $intErrCode );
					exit;
			}
		}

		/**
		 * Validates and sanitizes the URL elements needed for templates to be
		 * displayed properly.
		 */
		private function ValidateURI()
		{

			/**
			 * We will always only have 'module' and 'invoke'
			 */
			if ( isset( $_GET['module'] ) && isset( $_GET['invoke'] ) )
			{
				$this->strModule = $_GET['module'];
				$this->strInvoke = $_GET['invoke'];

				/**
				 * URI template values must be alphanumeric.
				 */
				if ( !ctype_alnum( $this->strModule ) || !ctype_alnum( $this->strInvoke ) )
				{
					$this::HTTPError('404');
				}

				/**
				 * Verify Existance of module and invokation... test invoke:
				 */
				if ( file_exists( 'modules/' . $this->strModule . '.module.class.php' ) )
				{
					require_once( 'modules/' . $this->strModule . '.module.class.php' );

					$strClass = $this->strModule . 'UI';
					$this->objInstance = new $strClass($this->strInvoke);
				}
				else
				{
					$this::HTTPError('404');
				}
			}
			else
			{
				if ( !isset( $_GET['module'] ) && !isset( $_GET['invoke'] ) )
				{
					require_once( 'modules/Root.module.class.php' );
					$this->instance = new RootUI('Root');
				}
				elseif ( !isset( $_GET['module'] ) || !isset( $_GET['invoke'] ) )
				{
					$this::HTTPError('404');
				}
			}

		}

	}

	abstract class TemplateReq extends TemplateHandler
	{

		/**
		 * Template engine object instance.
		 * @var [object]
		 */
		protected $objEngine;

		/**
		 * HTML error handler instance.
		 * @var [object]
		 */
		protected $objHtmlErrors;

		/**
		 * Globally used instance of session handler.
		 * @var [object]
		 */
		protected $objSessionsHandler;

		/**
		 * Check the invokation request and prepare the corresponding page
		 * to be built.
		 * @param [str] $strInvoke [Invoke from GET request]
		 */
		public function __construct( $strInvoke )
		{

			if ( is_numeric( substr( $strInvoke, 1 ) ) )
			{
				$strInvoke = 'n' . $strInvoke;
			}

			if ( !method_exists( $this, $strInvoke ) )
			{
				TemplateHandler::HTTPError('404');
			}
			else
			{
				$strHandler               = TemplateHandler::GetHandler();
				$this->objHtmlErrors      = new HTMLError;
				$this->objSessionsHandler = new SessionsHandler;
				$this->objEngine          = new $strHandler;
				$this->objEngine->setCacheDir( CACHE_DIR );
				$this->objEngine->setCompileDir( COMPILED_DIR );

				$this->$strInvoke();
			}

		}

	}
