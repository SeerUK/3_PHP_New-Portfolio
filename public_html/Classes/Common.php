<?php

	/**
	 * Common Functions
	 *
	 * Functions that are used frequently throughout the website go in here.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	class Common
	{
		/**
		 * Gets a corretly formatted URL for a link dependant on rewrite
		 * setting in config.
		 * @param  [string] $request [The request value]
		 * @return [string]          [The formatted request to append to the URL]
		 */
		public static function getFormattedRequest( $request )
		{
			if( URI_REWRITTEN )
			{
				return $request;
			}
			else
			{
				return '?request=' . $request;
			}
		}

		/**
		 * Returns the primary navigation for use in templates.
		 * @return [array]
		 */
		public static function getPrimaryNav()
		{
			/**
			 * @todo: Get this from the database:
			 */
			return array(
				'Home'      => ROOT,
				'Blog'      => ROOT . Common::getFormattedRequest( 'Blog/' ),
				'Skills'    => ROOT . Common::getFormattedRequest( 'Home/Skills/' ),
				'Portfolio' => ROOT . Common::getFormattedRequest( 'Home/Portfolio/' ),
				'Contact'   => ROOT . Common::getFormattedRequest( 'Home/Contact/' )
			);
		}

		/**
		 * Converts Unix timestamps into a relative time (i.e. Facebook style.)
		 * @param  [integer] $timestamp [A unix timestamp to be converted]
		 * @return [string]
		 */
		public static function relativeTime( $timestamp )
		{
			$timeDifference = time() - $timestamp;
			$timePeriods    = array( 'second', 'minute', 'hour', 'day', 'week','month', 'years', 'decade' );
			$timeLengths    = array( '60', '60', '24', '7', '4.35', '12', '10' );

			if ( $timeDifference > 0 )
			{
				$timeSuffix = 'ago';
			}
			else
			{
				$timeDifference = -$timeDifference;
				$timeSuffix     = 'to go';
			}

			for( $j = 0; $timeDifference >= $timeLengths[$j]; $j++ )
			{
				$timeDifference /= $timeLengths[$j];
				$timeDifference = round( $timeDifference );
			}

			if( $timeDifference != 1 ) $timePeriods[$j].= 's';

			return $timeDifference . ' ' . $timePeriods[$j] . ' ' . $timeSuffix;
		}

	}

	class HtmlError
	{

		/**
		 * Array to store all the HTML errors in.
		 * @var array
		 */
		private $errors = array();

		/**
		 * Returns all of the HTML errors to display.
		 * @return [array] [All of the HTML errors stored]
		 */
		public function getHTMLErrors()
		{
			return $this->errors;
		}

		/**
		 * Adds an entry to the errors array.
		 * @param [string] $errorType    [The error type used as CSS style and message prefix]
		 * @param [string] $errorMessage [The error message]
		 */
		public function setHTMLError( $errorType, $errorMessage )
		{
			switch ( $errorType )
			{
				case 'info':
				case 'success':
				case 'error':
				case 'warning':
					break;
				default:
					$errorType = 'error';
					break;
			}

			$this->errors[] = array(
				'type'    => $errorType,
				'message' => $errorMessage
			);
		}

	}
