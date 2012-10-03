<?php

	/**
	 * Github Feed Parser
	 *
	 * Parses Github feeds using the Github API (v3).
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require('ParseInterface.php');

	class GithubParser implements ParseInterface
	{

		/**
		 * The current feed item when iterating over each item in the raw feed
		 * @var [object]
		 */
		private $_feedItem;

		/**
		 * The raw feed returned from the Github API in the form of a PHP array
		 * @var [array]
		 */
		private $_rawFeed;

		/**
		 * The user to parse the feed of
		 * @var [string]
		 */
		private $_username;

		/**
		 * Pass in Github username for feed to parse
		 * @param [string] $username [The user to parse the feed of]
		 */
		public function __construct( $username )
		{
			$this->_username = $username;
		}

		/**
		 * Returns the feed
		 * @return [array] [The raw feed]
		 */
		private function _getFeed()
		{
			/* Dev values:
			=========== */
			$feedRoot = 'http://www.elliot-wright.net';
			$feedUri  = '/Feed/SeerUK/';

			/* Production values:
			================== */
			//$feedRoot = 'https://api.github.com';
			//$feedUri  = '/users/' . $this->_username . '/events';

			$curl = curl_init();

			curl_setopt( $curl, CURLOPT_URL, $feedRoot . $feedUri );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $curl, CURLOPT_TIMEOUT, 1 );

			return json_decode( curl_exec( $curl ) );
		}

		/**
		 * Sets up the parsing of each event from the Github feed.
		 * @return [array] [description]
		 *
		 * @todo Cache feed, then stop using development values.
		 */
		public function parse()
		{
			$this->_rawFeed = $this->_getFeed();

			$feed = [ ];

			$i = 0;
			foreach( $this->_rawFeed as $feedItem )
			{
				$feed[$i]['type']      = 'github';
				$feed[$i]['content']   = $this->_delegateEventHandler( $feedItem );
				$feed[$i]['timestamp'] = strtotime( $feedItem->created_at );

				$i++;
			}

			return $feed;
		}

		/**
		 * Delegates an event handler to handle all all of the Github payloads
		 * @param  [object] $feedItem [The current feed item]
		 */
		private function _delegateEventHandler( $feedItem )
		{
			$this->_feedItem = $feedItem;
			$eventHandler    = '_' . $this->_feedItem->type;

			//if(method_exists($this, $eventHandler))
			//{
			//	return $this->$eventHandler( $feedItem );
			//}
			//else
			//{
				return $this->_DefaultEvent( $feedItem );
			//}
		}

		private function _CommitCommentEvent()
		{

		}

		private function _CreateEvent()
		{

		}

		private function _DefaultEvent()
		{
			return "test";
		}

		private function _DeleteEvent()
		{

		}

		private function _DownloadEvent()
		{

		}

		private function _FollowEvent()
		{

		}

		private function _ForkEvent()
		{

		}

		private function _ForkApplyEvent()
		{

		}

		private function _GistEvent()
		{

		}

		private function _GollumEvent()
		{

		}

		private function _IssueCommentEvent()
		{

		}

		private function _IssuesEvent()
		{

		}

		private function _MemberEvent()
		{

		}

		private function _PublicEvent()
		{

		}

		private function _PullRequestEvent()
		{

		}

		private function _PullRequestReviewCommentEvent()
		{

		}

		private function _PushEvent()
		{

		}

		private function _TeamAddEvent()
		{

		}

		private function _WatchEvent()
		{

		}


	}