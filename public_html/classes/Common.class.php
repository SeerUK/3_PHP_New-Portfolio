<?php

	/**
	 * Common Functions
	 *
	 * Functions that are used frequently throughout the website go in here.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since 	[v0.1-alpha]
	 *
	 */

	class Common
	{

		/**
		 * Returns the primary navigation for use in templates.
		 * @return [array]
		 */
		public static function getPrimaryNav()
		{
			/**
			 * @todo: Get this from the database:
			 */
			return array( 'Home'      => ROOT . '?module=Root&invoke=Root'
			            , 'Blog'      => ROOT . '?module=Blog&invoke=Root'
			            , 'Skills'    => ROOT . '?module=Root&invoke=Skills'
			            , 'Portfolio' => ROOT . '?module=Root&invoke=Portfolio'
			            , 'Contact'   => ROOT . '?module=Root&invoke=Contact' );
		}

		/**
		 * Converts Unix timestamps into a relative time (i.e. Facebook style.)
		 * @param [integer] $timTimestamp [A unix timestamp to be converted]
		 * @return [string]
		 */
		public static function RelativeTime( $stmTimestamp )
		{
			$stmDifference = time() - $stmTimestamp;
			$arrPeriods = array( 'second', 'minute', 'hour', 'day', 'week','month', 'years', 'decade' );
			$arrLengths = array( '60','60','24','7','4.35','12','10' );

			if ( $stmDifference > 0 )
			{
				$strEnding = 'ago';
			}
			else
			{
				$stmDifference = -$stmDifference;
				$strEnding = 'to go';
			}

			for( $j = 0; $stmDifference >= $arrLengths[$j]; $j++ )
			{
				$stmDifference /= $arrLengths[$j];
				$stmDifference = round( $stmDifference );
			}

			if( $stmDifference != 1 ) $arrPeriods[$j].= 's';

			return $stmDifference . ' ' . $arrPeriods[$j] . ' ' . $strEnding;
		}

		/**
		 * Ensures that pages that require insecure connections are accessing
		 * the page with the insecure connection config variables:
		 *
		 * @todo: Use non-secure path.
		 */
		public static function RequireInsecure()
		{
			if( isset( $_SERVER['HTTPS'] ) || $_SERVER['HTTP_HOST'] != DOMAIN )
			{
				var_dump( $_SERVER['REQUEST_URI'] );
				return;

				header( 'Location: ' . ROOT . $_SERVER['REQUEST_URI'] );
				exit;
			}
		}

		/**
		 * Ensures that pages that require secure connections are accessing the
		 * page with the secure connection config variables:
		 *
		 * @todo: Use secure path.
		 */
		public static function RequireSecure()
		{
			if( !isset( $_SERVER['HTTPS'] ) || $_SERVER['HTTP_HOST'] != SECURE_DOMAIN )
			{
				header( 'Location: ' . SECURE_ROOT . $_SERVER['REQUEST_URI'] );
				exit;
			}
		}


	}

	class HTMLError
	{

		/**
		 * Array to store all the HTML errors in.
		 * @var array
		 */
		private $arrErrors = array();

		/**
		 * Returns all of the HTML errors to display.
		 * @return [array] [All of the HTML errors stored]
		 */
		public function getHTMLErrors()
		{
			return $this->arrErrors;
		}

		/**
		 * Adds an entry to the errors array.
		 * @param [string] $strErrorType    [The error type used as CSS style and message prefix]
		 * @param [string] $strErrorMessage [The error message]
		 */
		public function setHTMLError( $strErrorType, $strErrorMessage )
		{
			switch ($strErrorType)
			{
				case 'info':
				case 'success':
				case 'error':
				case 'warning':
					break;
				default:
					$strErrorType = 'error';
					break;
			}

			$this->arrErrors[] = array( 'type' => $strErrorType
			                          , 'message' => $strErrorMessage );
		}

	}
