<?php

	/**
	 * Database Handler
	 *
	 * Acts as the database abstraction layer at a higher level. Just to be
	 * ultra flexible here we can switch bewtween different DBA's whenver
	 * we need to and just update this file.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	require_once( 'Libs/Db/dibi.php' );

	class DbHandler
	{
		/**
		 * Connects to the database.
		 */
		public static function connect()
		{
			dibi::connect( array(
				'driver'    => DB_DRIVER,
				'host'      => DB_HOST,
				'username'  => DB_USER,
				'password'  => DB_PASS,
				'database'  => DB_MAIN,
			));
		}

		/**
		 * Escapes unescaped strings so that they're safe(r) for the database.
		 * @param  [string] $string [The string to be escaped]
		 * @return [string]
		 */
		public static function escape( $string )
		{
			return mysql_real_escape_string( $string );
		}

		/**
		 * Fetches a single value (must select only 1 value) for a given query
		 * @param  [string] $query [The query to return values for]
		 * @return [string]
		 */
		public static function fetch( $query )
		{
			return dibi::fetchSingle( $query );
		}

		/**
		 * Fetches all rows for a given query
		 * @param  [string] $query [The query to return values for]
		 * @return [array]
		 */
		public static function fetchAll( $query )
		{
			return dibi::fetchAll( $query );
		}

		/**
		 * Fetches a single row for a given query
		 * @param  [string] $query [The query to return values for]
		 * @return [array]
		 */
		public static function fetchRow( $query )
		{
			return dibi::fetch( $query) ;
		}

		/**
		 * Runs a given query
		 * @param  [string] $query [The query to run]
		 * @return [object]
		 */
		public static function query( $query )
		{
			try
			{
				$result = dibi::query( $query );
				return $result;
			}
			catch ( DibiDriverException $e )
			{
				trigger_error( '<strong></strong> DbHandler::Query Error: <strong>' . $e->getMessage() . '</strong> in <strong>' . $e->getFile() . '</strong> on line <strong>' . $e->getLine() . '</strong>', E_USER_ERROR );
				exit;
			}
		}
	}
