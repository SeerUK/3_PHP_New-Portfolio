<?php

	/**
	 * Initialisation File
	 *
	 * Sets up the systems environment by providing configuration values and
	 * then running the rest of the system.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	//--------------------------------------------------------------------------
	// Configuration::
	//--------------------------------------------------------------------------

	/* Domain Settings:
	 * ================ */
	define( 'DOMAIN',               'ewp.pde.com' );
	define( 'SECURE_DOMAIN',        'secure.pde.com');
	define( 'PROTOCOL',             'http://' );
	define( 'SECURE_PROTOCOL',      'https://' );
	define( 'URI',                  '/' );
	define( 'SECURE_URI',           '/3/' );
	define( 'ROOT',                 PROTOCOL . DOMAIN . URI );
	define( 'SECURE_ROOT',          SECURE_PROTOCOL . SECURE_DOMAIN . SECURE_URI );
	define( 'COOKIE_DOMAIN',        DOMAIN );
	define( 'COOKIE_PATH',          '/' );
	define( 'SECURE_COOKIE_DOMAIN',  SECURE_DOMAIN );
	define( 'SECURE_COOKIE_PATH',   '/3/' );

	/* Setup secure settings:
	 * ====================== */
	if ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == "on" )
	{
		define( 'STATIC_ROOT',      SECURE_ROOT . 'static/' );
	}
	else
	{
		define( 'STATIC_ROOT',      ROOT . 'static/' );
	}

	/* File System Settings:
	 *
	 * These Settings are specific to Smarty.
	 * ====================================== */
	define( 'CACHE_DIR',        'C:/cache/' . DOMAIN . '/cache' );
	define( 'COMPILED_DIR',     'C:/cache/' . DOMAIN . '/compiled' );

	/* Database Settings:
	 * ================== */
	define( 'DB_DRIVER',        'mysql' );
	define( 'DB_HOST',          'localhost' );
	define( 'DB_USER',          'root' );
	define( 'DB_PASS',          'Diablo2' );

	/* Databases:
	 * ========== */
	define( 'DB_MAIN',            'ew_portfolio' );

	/* Website Settings:
	 * ================= */
	define( 'TITLE',            'Elliot Wright' );


	//--------------------------------------------------------------------------
	// Build Website::
	//--------------------------------------------------------------------------

	/* Set the website timezone to UTC if no timezone is specified in the
	 * php.ini file.
	 * ================================================================== */
	if ( function_exists( 'date_default_timezone_set' ) )
	{
		if ( ! @date_default_timezone_get() )
		{
			date_default_timezone_set( @ini_get( 'date.timezone' ) ? ini_get( 'date.timezone' ) : 'UTC' );
		}
		else
		{
			date_default_timezone_set( 'UTC' );
		}
	}


	require( 'Handlers/Db.php' );
	require( 'Handlers/Template.php' );

	/* Begin Initialisation:
	 * ===================== */
	DbHandler::connect();                   // Connect to the database
	$templateHandler = new TemplateHandler; // Create template instance
