<?php

	/**
	 * Session Handler
	 *
	 * Handles setting up and validating sessions for user authentication
	 * requests from both the login system and the authentication system.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since 	[v0.1-alpha]
	 *
	 */

	require_once( 'handlers/password.handler.php' );

	class SessionsHandler
	{

		public function __construct()
		{
			session_start();
		}

		/**
		 * Attempts to set up a session with the given credentials.
		 * @param  [string]  $strUsername [The username to set up the session for]
		 * @param  [string]  $strPassword [The password to compare against the given users]
		 * @param  [boolean] $bolRemember [Whether or not the user wishes for their session to be remembered]
		 * @return [string]               [The resulting status of the session setup attempt]
		 */
		public function Setup( $strUsername, $strPassword, $bolRemember = false )
		{
			$strQuery = 'SELECT strUserName '.
			                 ', strUserPassword '.
			              'FROM tblUser '.
			             "WHERE strUserName = '$strUsername' ".
			             'LIMIT 1';
			$arrUser = DbHandler::FetchRow( $strQuery );

			/* Check that the user exists:
			 * =========================== */
			if( $arrUser == false )
			{
				return 'BadUser';
			}

			/* Check that their password is valid:
			 * =================================== */
			if( !PasswordHandler::Check( $strPassword, $arrUser['strUserPassword'] ) )
			{
				return 'BadPassword';
			}

			return 'GoodRequest';
		}


	}
