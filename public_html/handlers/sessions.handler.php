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
			$this->Read();
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
			$strUsername = DbHandler::Escape( $strUsername );
			$strPassword = DbHandler::Escape( $strPassword );

			if( !preg_match( '/^([A-Za-z0-9_])+$/', $strUsername ) )
			{
				return 'BadRequest';
			}

			$strQuery = 'SELECT intUserId '.
			                 ', strUserName '.
			                 ', strUserPassword '.
			              'FROM '.DB_MAIN.'.tblUser '.
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


			/* Setup DB Session:
			 * ================= */
			$strSessionId       = md5( time() . rand( 0, 65535 ) );
			$strSecureSessionId = md5( time() . rand( 0, 4294836225 ) );
			$intUserId          = $arrUser['intUserId'];
			$strUserPassword    = $arrUser['strUserPassword'];
			$strUserAgent       = $_SERVER['HTTP_USER_AGENT'];
			$strRemoteAddr      = $_SERVER['REMOTE_ADDR'];

			/* Remove Old Session Data (if any):
			 * ================================= */
			DbHandler::Query('DELETE FROM '.DB_MAIN.".tblSession WHERE strRemoteAddr = '$strRemoteAddr'");

			/* Insert Insecure Session Data:
			 * ============================= */
			$strQuery = 'INSERT INTO '.DB_MAIN.'.tblSession( strSessionId '.
			                      ', intUserId '.
			                      ', strUserPassword '.
			                      ', strUserAgent '.
			                      ', strRemoteAddr '.
			                      ', strType) '.
			                 "VALUES('$strSessionId' ".
			                      ", '$intUserId' ".
			                      ", '$strUserPassword' ".
			                      ", '$strUserAgent' ".
			                      ", '$strRemoteAddr' ".
			                      ', \'insecure\')';

			DbHandler::Query( $strQuery );

			/* Insert Secure Session Data:
			 * =========================== */
			$strQuery = 'INSERT INTO '.DB_MAIN.'.tblSession( strSessionId '.
			                      ', intUserId '.
			                      ', strUserPassword '.
			                      ', strUserAgent '.
			                      ', strRemoteAddr '.
			                      ', strType) '.
			                 "VALUES('$strSecureSessionId' ".
			                 	  ", '$intUserId' ".
			                 	  ", '$strUserPassword' ".
			                 	  ", '$strUserAgent' ".
			                 	  ", '$strRemoteAddr' ".
			                 	  ', \'secure\')';

			DbHandler::Query( $strQuery );

			return 'OK';
		}

		/**
		 * Reads session information from the cookie we store.
		 */
		public function Read()
		{

		}


	}
