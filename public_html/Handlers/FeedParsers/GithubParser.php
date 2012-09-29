<?php

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
			/**
			 * Dev values:
			 */
			$feedRoot = 'http://ewp.pde.com';
			$feedUri  = '/feed/SeerUK/';

			/**
			 * Production values:
			 */
			//$feedRoot = 'https://api.github.com';
			//$feedUri  = '/users/' . $username . '/events';

			$curl = curl_init();

			curl_setopt( $curl, CURLOPT_URL, $feedRoot . $feedUri );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $curl, CONNECTTIMEOUT, 1 );

			$this->_rawFeed = json_decode( curl_exec( $curl ) );
		}

	}