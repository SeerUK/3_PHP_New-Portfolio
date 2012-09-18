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

	require_once( './Classes/Common.php' );
	require_once( 'Libs/Template/Smarty.class.php' );
	require_once( 'Errors.php' );
	require_once( 'Sessions.php' );
	require_once( 'Auth.php' );
	require_once( 'Feed.php' );

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
					header( 'Location: ' . ROOT . Common::getFormattedRequest( 'Error/' . $errorCode . '/' ) );
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
			$request = isset( $_GET['request'] ) ? $_GET['request'] : '';
			$uri     = explode( '/', $request );

			/**
			 * Page request handling can be fairly dyanmic, this is to account
			 * for all of the possible allowed combinations of request URI's
			 */
			$this->module = ucfirst( strtolower( (!empty( $uri[0] ) ? $uri[0] : 'Home' ) ) );
			$this->invoke = '_' . strtolower( (isset( $uri[1] ) ? (!empty( $uri[1] ) ? $uri[1] : 'Home') : 'Home' ) );

			/**
			 * Verify Existance of module and invokation... test invoke:
			 */
			if ( file_exists( 'Modules/' . $this->module . '.php' ) )
			{
				require_once( 'Modules/' . $this->module . '.php' );

				$moduleClass = $this->module . 'Ui';
				$this->template = new $moduleClass( $this->invoke );
			}
			else
			{
				$this::httpError( '404' );
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
			/**
			 * Create required variables and class instances:
			 */
			$templateHandler        = TemplateHandler::getHandler();
			$this->_htmlError       = new Errors;
			$this->_sessionsHandler = new SessionsHandler;
			$this->_templateEngine  = new $templateHandler;
			$this->_templateEngine->setCacheDir( CACHE_DIR );
			$this->_templateEngine->setCompileDir( COMPILED_DIR );

			/**
			 * Check and set connection type based on module enforcement:
			 */
			if ( $this->getSecureFlag() )
			{
				if ( !isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTP_HOST'] != SECURE_DOMAIN )
				{
					$this->_setConnectionType( 'secure' );
				}

				$this->_sessionsHandler->read( 'secure' );
			}
			else
			{
				if ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTP_HOST'] != DOMAIN )
				{
					$this->_setConnectionType( 'insecure' );
				}

				$this->_sessionsHandler->read( 'insecure' );
			}

			/**
			 * If the page does not exist in the module we're in then redirect
			 * user to the 404 page.
			 */
			if ( !method_exists( $this, $invoke ) )
			{
				TemplateHandler::httpError( '404' );
			}

			$this->$invoke();
		}

		protected function _setConnectionType( $type )
		{
			$request = isset( $_GET['request'] ) ? $_GET['request'] : '';
			$uri     = explode( '/', $request );

			$module = (!empty( $uri[0] ) ? ucfirst( strtolower( $uri[0] ) ) . '/' : '');
			$invoke = (!empty( $uri[1] ) ? ucfirst( strtolower( $uri[1] ) ) . '/' : '');

			switch ($type)
			{
				case 'secure':
					$location = SECURE_ROOT . $module . $invoke;
					break;
				case 'insecure':
					$location = ROOT . $module . $invoke;
					break;
				default:
					return false;
			}

			$skipRequest = isset( $_GET['request'] ) ? true : false;
			$firstGet    = true;
			foreach( $_GET as $getKey => $getValue )
			{
				if( $skipRequest )
				{
					$skipRequest = false;
					continue;
				}
				if( $firstGet )
				{
					$firstGet = false;
					$location.= '?';
				}
				else
				{
					$location.= '&';
				}

				$location.= $getKey . '=' . $getValue;
			}

			header( 'Location: ' . $location );
			exit;
		}

		public function getSecureFlag()
		{
			return (bool) $this->_secureFlag;
		}

	}
