<?php

	/**
	 * Template Handler
	 *
	 * Handles preparation of template files based upon the URL and sets up the
	 * page using the template engine specified above.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require_once( 'Libs/Template/Smarty.class.php' );
	require_once( 'Sessions.php' );
	require_once( 'Auth.php' );
	require_once( 'Feed.php' );
	require_once( './Classes/Common.php' );

	class TemplateHandler
	{

		/**
		 * Module from GET request
		 * @var [string]
		 */
		public $module;

		/**
		 * Invoke from GET request
		 * @var [string]
		 */
		public $invoke;

		/**
		 * Template system instance object
		 * @var [object]
		 */
		public $template;


		/**
		 * TemplateHandler constructor sets up page loading through the
		 * template system.
		 */
		public function __construct()
		{
			$this->_validateUri();
		}

		/**
		 * Returns current template handler, must be the name of the main class
		 * for the template system.
		 */
		public static function getHandler()
		{
			return 'Smarty';
		}

		/**
		 * Redirects the user to an appropriate error page based on the error
		 * code given.
		 * @param [integer] $errorCode [HTTP error code to display page for]
		 */
		public static function httpError( $errorCode )
		{
			switch( $errorCode )
			{
				case 404:
				default:
					header( 'Location: ' . ROOT . '?module=Error&invoke=' . $errorCode );
					exit;
			}
		}

		/**
		 * Validates and sanitizes the URL elements needed for templates to be
		 * displayed properly.
		 *
		 * @todo Sanitizing!
		 */
		private function _validateUri()
		{

			/**
			 * We will always only have 'module' and 'invoke'
			 */
			if ( isset( $_GET['module'] ) && isset( $_GET['invoke'] ) )
			{
				$this->module = ucfirst( strtolower( $_GET['module'] ) );
				$this->invoke = strtolower( $_GET['invoke'] );

				/**
				 * URI template values must be alphanumeric.
				 */
				if ( !ctype_alnum( $this->module ) || !ctype_alnum( $this->invoke ) )
				{
					$this::httpError( '404' );
				}

				/**
				 * Verify Existance of module and invokation... test invoke:
				 */
				if ( file_exists( 'Modules/' . $this->module . '.php' ) )
				{
					require_once( 'Modules/' . $this->module . '.php' );

					$strClass = $this->module . 'Ui';
					$this->template = new $strClass( $this->invoke );
				}
				else
				{
					$this::httpError( '404' );
				}
			}
			else
			{
				require_once( 'Modules/Root.php' );
				$this->template = new RootUI( 'root' );
			}

		}

	}

	abstract class TemplateAbstract
	{

		/**
		 * Template engine object instance.
		 * @var [object]
		 */
		protected $_templateEngine;

		/**
		 * HTML error handler instance.
		 * @var [object]
		 */
		protected $_htmlError;

		/**
		 * Globally used instance of session handler.
		 * @var [object]
		 */
		protected $_sessionHandler;

		/**
		 * Flag to check if page should be loaded as secure or insecure:
		 * @var [boolean]
		 */
		protected $_secureFlag;

		/**
		 * Check the invokation request and prepare the corresponding page
		 * to be built.
		 * @param [string] $invoke [Invoke from GET request]
		 */
		public function __construct( $invoke )
		{

			$invoke = '_' . $invoke;

			/* Check and set connection type based on module enforcement:
			 * ========================================================== */
			if ( $this->getSecureFlag() )
			{
				if ( !isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTP_HOST'] != SECURE_DOMAIN )
				{
					$uri = explode( '/', $_SERVER['REQUEST_URI'] );
					header( 'Location: ' . SECURE_ROOT . $uri[sizeof( $uri )-1] );
					exit;
				}
			}
			else
			{
				if ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTP_HOST'] != DOMAIN )
				{
					$uri = explode( '/', $_SERVER['REQUEST_URI'] );
					header( 'Location: ' . ROOT . $uri[sizeof( $uri )-1] );
					exit;
				}
			}

			if ( method_exists( $this, $invoke ) )
			{
				$templateHandler       = TemplateHandler::getHandler();
				$this->_htmlError      = new HtmlError;
				$this->_sessionHandler = new SessionsHandler;
				$this->_templateEngine = new $templateHandler;
				$this->_templateEngine->setCacheDir( CACHE_DIR );
				$this->_templateEngine->setCompileDir( COMPILED_DIR );

				$this->$invoke();
			}
			else
			{
				TemplateHandler::httpError('404');
			}
		}

		public function getSecureFlag()
		{
			return (bool) $this->_secureFlag;
		}

	}
