<?php

	/**
	 * Feed Handler
	 *
	 * Handles all kinds of feeds and merges them into one properly formatted
	 * array that can be used to show all parsed feeds at once merged.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since   [v0.1-alpha]
	 *
	 * @todo	[Compile list of feeds to read from from database]
	 * @todo	[Find some way to limit the full returned feed before
	 *			sorting. This could get REALLY slow after a while...]
	 *
	 */

	/* IMPORTANT: For any remote feed, try set up a cron job to download it to
	 * the server the website is on instead every 5 minutes or so. It will make
	 * any page with the feeds on load a LOT faster than it will with it
	 * connecting remotely.
	 * ======================================================================== */

	class FeedHandler
	{

		/**
		 * The final feed array (unsorted)
		 * @var array
		 */
		private $arrFeed = array();

		/**
		 * Parses a feed by passing it to the appropriate feed handler. If the
		 * feed handler specified doesn't exist then the function will simply
		 * ignore the feed.
		 * @param [string] $strSource [The source of the feed]
		 * @param [string] $strType   [The feed type]
		 */
		public function Parse( $strSource, $strType )
		{
			switch( $strType )
			{
				case 'github':
					@$this->Parse_GitHub( $strSource );
					break;
				default:
					break;
			}
		}

		/**
		 * Parses Github atom files (currently).
		 * @param [string] $strSource [The source file (can be remote)]
		 * @todo  [Parse XML properly]
		 */
		private function Parse_GitHub( $strSource )
		{
			$xml = simplexml_load_file( $strSource );

			if( $xml )
			{

				$arrFeed = array();

				foreach( $xml->entry as $entry )
				{
					$strContent = str_replace( 'href="/', 'href="https://www.github.com/', $entry->content );
					$strContent = str_replace( 'href="',  'target="_blank" href="', $strContent );

					$timTimestamp = str_replace( 'T', ' ', $entry->updated );
					$timTimestamp = str_replace( 'Z', '', $timTimestamp );

					$timTimestamp = strtotime( $timTimestamp );

					$arrFeed[] = array( 'content'   => $strContent
									  , 'type'	  => 'Github'
									  , 'timestamp' => $timTimestamp );
				}

				$this->arrFeed = array_merge_recursive( $this->arrFeed, $arrFeed );
			}
			else
			{
				error_log( '[Feed Handler::Github] Failed to load feed.' );
			}
		}

		/**
		 * Returns the feed ready for placing in a webpage
		 * @param [integer] $intLimit [If specified; limits the number of entires returned]
		 * @return [array]
		 */
		public function ReturnFeed( $intLimit = false )
		{
			$arrFull   = array();
			$arrReturn = array();

			/* Build the full list of all feed entries.
			 * ======================================== */
			foreach( $this->arrFeed as $strEntry )
			{
				$arrFull[] = $strEntry;
			}

			/* Sort the array by time before returning...
			 * ========================================== */
			$this->SortFeed($arrFull, 'timestamp');

			foreach( $arrFull as $strEntry )
			{
				$strEntry['timestamp'] = GenericCommon::RelativeTime( $strEntry['timestamp'] );
				if( $intLimit )
				{
					$arrReturn[] = $strEntry;
					$intLimit = $intLimit - 1;
					if( $intLimit == 0 )
					{
						break;
					}
				}
				else
				{
					$arrReturn[] = $strEntry;
				}
			}

			return $arrReturn;
		}

		/**
		 * Sorts the feeds multidimensional array so that all of the feeds
		 * can be sorted by time.
		 * @param [array] $arrFeed      [The feed array]
		 * @param [string] $strColumn    [The key to sort by in the feed array]
		 * @param [string] $strDirection [(Optional) Sorting direction]
		 */
		public function SortFeed( &$arrFeed, $strColumn, $strDirection = SORT_DESC )
		{
			$arrSortCol = array();

			foreach( $arrFeed as $strKey => $arrRow )
			{
				$arrSortCol[$strKey] = $arrRow[$strColumn];
			}

			$result = array_multisort( $arrSortCol, $strDirection, $arrFeed);
		}

	}
