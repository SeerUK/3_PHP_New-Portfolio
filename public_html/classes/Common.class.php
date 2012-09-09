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
		public static function GetPrimaryNav()
		{
			/* TODO: Get this from the database:
			 * ================================ */
			return array( 'Home' => '?module=Root&invoke=Root'
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