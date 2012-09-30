<?php

	/**
	 * JavaScript Loader
	 *
	 * Loads all the JavaScript files in the JS directory as one big file,
	 * this means it can be loaded asynchronously without dependancies failing
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	if ( function_exists( 'date_default_timezone_set' ) )
	{
		if ( !@date_default_timezone_get() )
		{
			date_default_timezone_set( @ini_get( 'date.timezone' ) ? ini_get( 'date.timezone' ) : 'UTC' );
		}
		else
		{
			date_default_timezone_set( 'UTC' );
		}
	}

	header( 'Cache-Control: max-age=604800' );
	header( 'Content-Type: application/javascript' );
	header( 'Last-Modified: ' . date( 'F d Y H:i:s.', getlastmod() ) );

	if ( $handle = opendir( './' ) ) {
		$files = array();

	    while ( false !== ( $entry = readdir( $handle ) ) ) 
	    {
	    	if( preg_match( '/[^\s]+(\.(?i)(min\.js))$/', $entry ) )
	    	{
	    		$files[] = $entry;
	    	}
	    }
	    closedir( $handle );
	}

	if( $key = array_search( 'jquery.min.js', $files ) ) 
	{
		echo file_get_contents( $files[$key] );
		echo "\n";
		unset( $files[$key] );
	}

	foreach( $files as $file )
	{
		echo file_get_contents( $file );
		echo "\n";
	}