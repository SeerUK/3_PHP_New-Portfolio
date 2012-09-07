<?php

	/**
	 * Database Handler
	 *
	 * Acts as the database abstraction layer at a higher level. Just to be
	 * ultra flexible here we can switch bewtween different DBA's whenver
	 * we need to and just update this file.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since   [v0.1-alpha]
	 *
	 */

	require_once( 'db.libs/dibi.php' );

	class DbHandler
	{
		/**
		 * Connects to the database.
		 */
		public static function Connect()
		{
			dibi::connect( array(
				'driver'    => DB_DRIVER,
				'host'      => DB_HOST,
				'username'  => DB_USER,
				'password'  => DB_PASS,
				'database'  => DB_DB,
			));
		}

		/**
		 * Escapes unescaped strings so that they're safe(r) for the database.
		 * @param [string] $strEscape [The string to be escaped]
		 */
		public static function Escape($strEscape)
		{
			return mysql_real_escape_string($strEscape);
		}

		/**
		 * Fetches a single value (must select only 1 value) for a given query
		 * @param [string] $strQuery [The query to return values for]
		 */
		public static function Fetch($strQuery)
		{
			return dibi::fetchSingle($strQuery);
		}

		/**
		 * Fetches all rows for a given query
		 * @param [string] $strQuery [The query to return values for]
		 */
		public static function FetchAll($strQuery)
		{
			return dibi::fetchAll($strQuery);
		}

		/**
		 * Fetches a single row for a given query
		 * @param [string] $strQuery [The query to return values for]
		 */
		public static function FetchRow($strQuery)
		{
			return dibi::fetch($strQuery);
		}

		/**
		 * Runs a given query
		 * @param [string] $strQuery [The query to run]
		 */
		public static function Query($strQuery)
		{
			try
			{
				$result = dibi::query($strQuery);
				return $result;
			}
			catch ( DibiDriverException $e )
			{
				trigger_error( '<strong></strong> DbHandler::Query Error: <strong>' . $e->getMessage() . '</strong> in <strong>' . $e->getFile() . '</strong> on line <strong>' . $e->getLine() . '</strong>', E_USER_ERROR );
				exit;
			}
		}
	}
