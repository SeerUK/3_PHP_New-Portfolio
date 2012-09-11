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

	class GenericCommon
	{

		/**
		 * Returns the primary navigation for use in templates.
		 * @return [array]
		 */
		public static function getPrimaryNav()
		{
			/* TODO: Get this from the database:
			 * ================================ */
			return array( 'Home' => '?module=Root&invoke=Root'
			            , 'Blog' => '?module=Blog&invoke=Root'
			            , 'Skills' => '?module=Root&invoke=Skills'
			            , 'Portfolio' => '?module=Root&invoke=Portfolio'
			            , 'Contact' => '?module=Root&invoke=Contact' );

		}

		/**
		 * Converts Unix timestamps into a relative time (i.e. Facebook style.)
		 * @param [integer] $timTimestamp [A unix timestamp to be converted]
		 * @return [string]
		 */
		public static function RelativeTime( $timTimestamp )
		{
			$timDifference = time() - $timTimestamp;
			$arrPeriods = array( "second", "minute", "hour", "day", "week","month", "years", "decade" );
			$arrLengths = array( "60","60","24","7","4.35","12","10" );

			if ( $timDifference > 0 )
			{
				$strEnding = "ago";
			}
			else
			{
				$timDifference = -$timDifference;
				$strEnding = "to go";
			}

			for( $j = 0; $timDifference >= $arrLengths[$j]; $j++ )
			{
				$timDifference /= $arrLengths[$j];
				$timDifference = round( $timDifference );
			}

			if( $timDifference != 1 ) $arrPeriods[$j].= "s";

			return $timDifference.' '.$arrPeriods[$j].' '.$strEnding;
		}


	}

	class HTMLError
	{

		/**
		 * Array to store all the HTML errors in.
		 * @var array
		 */
		protected $arrErrors = array();

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