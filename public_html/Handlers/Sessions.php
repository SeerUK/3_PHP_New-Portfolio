<?php

	/**
	 * Session Handler
	 *
	 * Handles setting up and validating sessions for user authentication
	 * requests from both the login system and the authentication system.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require_once( 'Handlers/Password.php' );

	class SessionsHandler
	{

		public function __construct()
		{
			session_start();
		}

		/**
		 * Attempts to set up a session with the given credentials.
		 * @param  [string]  $username [The username to set up the session for]
		 * @param  [string]  $password [The password to compare against the given users]
		 * @param  [boolean] $remember [Whether or not the user wishes for their session to be remembered]
		 * @return [string]            [The resulting status of the session setup attempt]
		 */
		public function setup( $username, $password, $remember = false )
		{
			$username = DbHandler::escape( $username );
			$password = DbHandler::escape( $password );

			if( !preg_match( '/^([A-Za-z0-9_])+$/', $username ) )
			{
				return 'BadRequest';
			}

			$query = 'SELECT intUserId '
			       .      ', strUserName '
			       .      ', strUserPassword '
			       .   'FROM ' . DB_MAIN . '.tblUser '
			       .  "WHERE strUserName = '$username' "
			       .  'LIMIT 1';

			$userInfo = DbHandler::fetchRow( $query );

			/* Check that the user exists:
			 * =========================== */
			if( $userInfo == false )
			{
				return 'BadUser';
			}

			/* Check that their password is valid:
			 * =================================== */
			if( !PasswordHandler::getIsValid( $password, $userInfo['strUserPassword'] ) )
			{
				return 'BadPassword';
			}


			/* Setup DB Session:
			 * ================= */
			$sessionId       = md5( time() . rand( 0, 65535 ) );
			$secureSessionId = md5( time() . rand( 0, 4294836225 ) );
			$userId          = $userInfo['intUserId'];
			$userPassword    = $userInfo['strUserPassword'];
			$userAgent       = $_SERVER['HTTP_USER_AGENT'];
			$remoteAddr      = $_SERVER['REMOTE_ADDR'];

			/* Remove Old Session Data (if any):
			 * ================================= */
			DbHandler::query( 'DELETE FROM ' . DB_MAIN . ".tblSession WHERE strRemoteAddr = '$remoteAddr'" );

			/* Insert Insecure Session Data:
			 * ============================= */
			$query = 'INSERT INTO ' . DB_MAIN . '.tblSession( strSessionId '
			       .           ', intUserId '
			       .           ', strUserPassword '
			       .           ', strUserAgent '
			       .           ', strRemoteAddr '
			       .           ', strType) '
			       .      "VALUES('$sessionId' "
			       .           ", '$userId' "
			       .           ", '$userPassword' "
			       .           ", '$userAgent' "
			       .           ", '$remoteAddr' "
			       .           ', \'insecure\')';

			DbHandler::query( $query );

			/* Insert Secure Session Data:
			 * =========================== */
			$query = 'INSERT INTO ' . DB_MAIN . '.tblSession( strSessionId '
			       .           ', intUserId '
			       .           ', strUserPassword '
			       .           ', strUserAgent '
			       .           ', strRemoteAddr '
			       .           ', strType) '
			       .      "VALUES('$secureSessionId' "
			       .           ", '$userId' "
			       .           ", '$userPassword' "
			       .           ", '$userAgent' "
			       .           ", '$remoteAddr' "
			       .           ', \'secure\')';

			DbHandler::query( $query );

			return 'OK';
		}

		/**
		 * Reads session information from the cookie we store.
		 */
		public function read()
		{

		}


	}
