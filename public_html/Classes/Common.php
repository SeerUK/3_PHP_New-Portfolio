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
		 * Returns the primary navigation for use in templates.
		 * @return [array]
		 */
		public static function getPrimaryNav()
		{
			/**
			 * @todo: Get this from the database:
			 */
			return array(
				'Home'      => ROOT . '?module=Root&invoke=Root',
				'Blog'      => ROOT . '?module=Blog&invoke=Root',
				'Skills'    => ROOT . '?module=Root&invoke=Skills',
				'Portfolio' => ROOT . '?module=Root&invoke=Portfolio',
				'Contact'   => ROOT . '?module=Root&invoke=Contact'
			);
		}

		/**
		 * Converts Unix timestamps into a relative time (i.e. Facebook style.)
		 * @param  [integer] $timestamp [A unix timestamp to be converted]
		 * @return [string]
		 */
		public static function RelativeTime( $timestamp )
		{
			$timeDifference = time() - $timestamp;
			$timePeriods    = array( 'second', 'minute', 'hour', 'day', 'week','month', 'years', 'decade' );
			$timeLengths    = array( '60','60','24','7','4.35','12','10' );

			if ( $timeDifference > 0 )
			{
				$suffix = 'ago';
			}
			else
			{
				$timeDifference = -$timeDifference;
				$suffix = 'to go';
			}

			for( $j = 0; $timeDifference >= $timeLengths[$j]; $j++ )
			{
				$timeDifference /= $timeLengths[$j];
				$timeDifference = round( $timeDifference );
			}

			if( $timeDifference != 1 ) $timePeriods[$j].= 's';

			return $timeDifference . ' ' . $timePeriods[$j] . ' ' . $suffix;
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
