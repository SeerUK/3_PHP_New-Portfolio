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

		private $_rawFeed;

		private $_username;

		public function __construct( $username )
		{
			$this->_username = $username;
		}

		public function parse()
		{
			$this->_getFeed();

			$feed = array();

			$i = 0;
			foreach( $this->_rawFeed as $responseItem )
			{
				/* Begin Friendly Output:
				 * ====================== */
				$feed[$i]['type'] = 'github';
				$feed[$i]['content'] = '<a target="_blank" href="https://github.com/' . $responseItem->actor->login . '">Elliot</a> ';

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

			return $feed;
		}

		private function _getFeed()
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
			//$feedUri  = '/users/' . $this->_username . '/events';

			$curl = curl_init();

			curl_setopt( $curl, CURLOPT_URL, $feedRoot . $feedUri );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $curl, CURLOPT_TIMEOUT, 1 );

			$this->_rawFeed = json_decode( curl_exec( $curl ) );
		}

	}