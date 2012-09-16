
<?php

	/**
	 * Feed Handler
	 *
	 * Handles all kinds of feeds and merges them into one properly formatted
	 * array that can be used to show all parsed feeds at once merged.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
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
		private $_feed = array();

		/**
		 * Parses a feed by passing it to the appropriate feed handler. If the
		 * feed handler specified doesn't exist then the function will simply
		 * ignore the feed.
		 * @param [string] $source [The source of the feed]
		 * @param [string] $type   [The feed type]
		 */
		public function parse( $source, $type )
		{
			switch( $type )
			{
				case 'github':
					@$this->_parseGithub( $source );
					break;
				default:
					break;
			}
		}

		/**
		 * Parses Github atom files (currently).
		 * @param [string] $user [The user of the feed we're parsing]
		 * @todo  [Parse XML properly]
		 */
		private function _parseGithub( $user )
		{
			/**
			 * Dev values:
			 */
			$feedRoot = 'http://ewp.pde.com';
			$feedUri  = '/feed/SeerUK/';

			/**
			 * Production values:
			 */
			//$feedRoot = 'https://api.github.com';
			//$feedUri  = '/users/' . $user . '/events';

			$curl = curl_init();

			curl_setopt( $curl, CURLOPT_URL, $feedRoot . $feedUri );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );

			// curl_setopt( $curl, CONNECTTIMEOUT, 1 );

			$curlRepsonse = json_decode( curl_exec( $curl ) );
			$feed         = array();

			$i = 0;
			foreach( $curlRepsonse as $responseItem )
			{
				/* Begin Friendly Output:
				 * ====================== */
				$feed[$i]['type'] = 'Github';
				$feed[$i]['content'] = '<a target="_blank" href="https://github.com/' . $responseItem->actor->login . '">' . $responseItem->actor->login . '</a> ';

				/* Handle different events from Github:
				 * ==================================== */
				switch ( $responseItem->type )
				{
					case 'CommitCommentEvent':
						$feed[$i]['content'].= 'commented on commit <a target="_blank" href="' . $responseItem->payload->comment->html_url . '">'
						                     . $responseItem->payload->comment->commit_id . '</a>';
						break;

					/* Creating Branches / Repositories:
					 * ================================= */
					case 'CreateEvent':
						switch ($responseItem->payload->ref_type)
						{
							case 'branch':
								$feed[$i]['content'].= 'created ' . $responseItem->payload->ref_type . ' <a target="_blank" href="https://github.com/' . $responseItem->repo->name . '/tree/'
								                     . $responseItem->payload->ref . '">' . $responseItem->payload->ref . '</a> in <a target="_blank" href="https://github.com/'
								                     . $responseItem->repo->name . '">' . $responseItem->repo->name . '</a>';
								break;
							case 'repository':
								$feed[$i]['content'].= 'created ' . $responseItem->payload->ref_type . ' <a target="_blank" href="https://github.com/' . $responseItem->repo->name . '">'
								                     . $responseItem->repo->name . '</a>';
								break;
							default:
								$feed[$i]['content'].= 'created a ' . $responseItem->payload->ref_type;
								break;
						}
						break;

					/* Creating / Editing Gists:
					 * ========================= */
					case 'GistEvent':
						switch ($responseItem->payload->action)
						{
							case 'update':
								$feed[$i]['content'].= 'updated';
								break;
							case 'create':
								$feed[$i]['content'].= 'created';
								break;
							default:
								$feed[$i]['content'].= 'was active with';
								break;
						}
						$feed[$i]['content'].= ' gist <a target="_blank" href="' . $responseItem->payload->gist->html_url . '">' . $responseItem->payload->gist->html_url . '</a>';
						break;

					/* Commenting on an 'Issue':
					 * ========================= */
					case 'IssueCommentEvent':
						$feed[$i]['content'].= 'commented on <a target="_blank" href="' . $responseItem->payload->issue->html_url . '">issue ' . $responseItem->payload->issue->number . '</a> in '
						                     . '<a target="_blank" href="https://github.com/' . $responseItem->repo->name . '">' . $responseItem->repo->name . '</a>';
						break;

					/* Pushing to a Branch -> Repository:
					 * ================================== */
					case 'PushEvent':
						$feed[$i]['content'].= 'pushed to <a target="_blank" href="https://github.com/' . $responseItem->repo->name . '/tree/' . str_replace('refs/heads/','',$responseItem->payload->ref) . '">'
						                     . str_replace('refs/heads/','',$responseItem->payload->ref) . '</a> in <a target="_blank" href="https://github.com/' . $responseItem->repo->name . '">'
						                     . $responseItem->repo->name . '</a>';
						break;

					/* Unhandled events:
					 * ================= */
					default:
						$feed[$i]['content'].= 'was active on Github';
				}

				$feed[$i]['timestamp'] = strtotime( $responseItem->created_at );

				$i = $i + 1;
			}

			$this->_feed = array_merge_recursive( $this->_feed, $feed );
		}

		/**
		 * Returns the feed ready for placing in a webpage
		 * @param  [integer] $limit [If specified; limits the number of entires returned]
		 * @return [array]
		 */
		public function returnFeed( $limit = false )
		{
			$full   = array();
			$return = array();

			/* Build the full list of all feed entries.
			 * ======================================== */
			foreach( $this->_feed as $entry )
			{
				$full[] = $entry;
			}

			/* Sort the array by time before returning...
			 * ========================================== */
			$this->sortFeed( $full, 'timestamp' );

			foreach( $full as $entry )
			{
				$entry['timestamp'] = Common::relativeTime( $entry['timestamp'] );
				if( $limit )
				{
					$return[] = $entry;
					$limit = $limit - 1;
					if( $limit == 0 )
					{
						break;
					}
				}
				else
				{
					$return[] = $entry;
				}
			}

			return $return;
		}

		/**
		 * Sorts the feeds multidimensional array so that all of the feeds
		 * can be sorted by time.
		 * @param [array]  $feed      [The feed array]
		 * @param [string] $column    [The key to sort by in the feed array]
		 * @param [string] $direction [(Optional) Sorting direction]
		 */
		public function sortFeed( &$feed, $column, $direction = SORT_DESC )
		{
			$sortColumn = array();

			foreach( $feed as $key => $row )
			{
				$sortColumn[$key] = $row[$column];
			}

			$result = array_multisort( $sortColumn, $direction, $feed);
		}

	}
