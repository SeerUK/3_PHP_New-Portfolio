
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
		private function Parse_GitHub( $strUser )
		{
			/**
			 * Dev values:
			 */
			$strRoot = 'http://ewp.pde.com';
			$strURI  = '/feed/SeerUK/';

			/**
			 * Production values:
			 */
			//$strRoot = 'https://api.github.com';
			//$strURI  = '/users/' . $strUser . '/events';

			$objCurl = curl_init();

			curl_setopt( $objCurl, CURLOPT_URL, $strRoot . $strURI );
			curl_setopt( $objCurl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $objCurl, CURLOPT_SSL_VERIFYPEER, false );

			// curl_setopt( $objCurl, CONNECTTIMEOUT, 1 );
			$strResponse = curl_exec( $objCurl );
			$objResponse = json_decode( $strResponse );
			$arrFeed	 = array();

			$i = 0;
			foreach( $objResponse as $objItem )
			{
				/* Begin Friendly Output:
				 * ====================== */
				$arrFeed[$i]['type'] = 'Github';
				$arrFeed[$i]['content'] = '<a target="_blank" href="https://github.com/' . $objItem->actor->login . '">' . $objItem->actor->login . '</a> ';

				/* Handle different events from Github:
				 * ==================================== */
				switch ( $objItem->type )
				{

					case 'CommitCommentEvent':
						$arrFeed[$i]['content'].= 'commented on commit <a target="_blank" href="' . $objItem->payload->comment->html_url . '">' . $objItem->payload->comment->commit_id . '</a>';
						break;

					/* Creating Branches / Repositories:
					 * ================================= */
					case 'CreateEvent':
						switch ($objItem->payload->ref_type)
						{
							case 'branch':
								$arrFeed[$i]['content'].= 'created ' . $objItem->payload->ref_type . ' <a target="_blank" href="https://github.com/' . $objItem->repo->name . '/tree/'
								                        . $objItem->payload->ref . '">' . $objItem->payload->ref . '</a> in <a target="_blank" href="https://github.com/' . $objItem->repo->name . '">'
								                        . $objItem->repo->name . '</a>';
								break;
							case 'repository':
								$arrFeed[$i]['content'].= 'created ' . $objItem->payload->ref_type . ' <a target="_blank" href="https://github.com/' . $objItem->repo->name . '">'
								                        . $objItem->repo->name . '</a>';
								break;
							default:
								$arrFeed[$i]['content'].= 'created a ' . $objItem->payload->ref_type;
								break;
						}
						break;

					/* Creating / Editing Gists:
					 * ========================= */
					case 'GistEvent':
						switch ($objItem->payload->action)
						{
							case 'update':
								$arrFeed[$i]['content'].= 'updated';
								break;
							case 'create':
								$arrFeed[$i]['content'].= 'created';
								break;
							default:
								$arrFeed[$i]['content'].= 'was active with';
								break;
						}
						$arrFeed[$i]['content'].= ' gist <a target="_blank" href="' . $objItem->payload->gist->html_url . '">' . $objItem->payload->gist->html_url . '</a>';
						break;

					/* Commenting on an 'Issue':
					 * ========================= */
					case 'IssueCommentEvent':
						$arrFeed[$i]['content'].= 'commented on <a target="_blank" href="' . $objItem->payload->issue->html_url . '">issue ' . $objItem->payload->issue->number . '</a> in '
						                        . '<a target="_blank" href="https://github.com/' . $objItem->repo->name . '">' . $objItem->repo->name . '</a>';
						break;

					/* Pushing to a Branch -> Repository:
					 * ================================== */
					case 'PushEvent':
						$arrFeed[$i]['content'].= 'pushed to <a target="_blank" href="https://github.com/' . $objItem->repo->name . '/tree/' . str_replace('refs/heads/','',$objItem->payload->ref) . '">'
						                        . str_replace('refs/heads/','',$objItem->payload->ref) . '</a> in <a target="_blank" href="https://github.com/' . $objItem->repo->name . '">'
						                        . $objItem->repo->name . '</a>';
						break;

					/* Unhandled events:
					 * ================= */
					default:
						$arrFeed[$i]['content'].= 'was active in';
						break;
				}

				$arrFeed[$i]['timestamp'] = strtotime( $objItem->created_at );

				$i = $i + 1;
			}

			$this->arrFeed = array_merge_recursive( $this->arrFeed, $arrFeed );
		}

		/**
		 * Returns the feed ready for placing in a webpage
		 * @param  [integer] $intLimit [If specified; limits the number of entires returned]
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
		 * @param [array]  $arrFeed      [The feed array]
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
