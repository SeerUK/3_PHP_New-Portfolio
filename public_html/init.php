<?php

    /**
     * 3_PHP_New-Portfolio
     *
     * @desc            Initialisation File - Sets up environment. Set
     *                  configuration values in here.
     *
     */

    //--------------------------------------------------------------------------
    // Main Configuration:
    //--------------------------------------------------------------------------

    /**
     * Domain Settings:
     */
    define( 'ROOT',             'http://ewp.pde.com/' );
    define( 'SECURE_ROOT',      'https://ewp.pde.com/' );
    define( 'STATIC_ROOT',      '//ewp.pde.com/static/' );
    define( 'COOKIE_DOMAIN',    'ewp.pde.com' );
    define( 'COOKIE_PATH',      '/' );

    /**
     * Database Settings
     */
    define( 'DB_DRIVER',        'mysql' );
    define( 'DB_HOST',          'localhost' );
    define( 'DB_USER',          'root' );
    define( 'DB_PASS',          'Diablo2' );
    define( 'DB_DB',            'ew_portfolio' );

    /**
     * Website Settings:
     */
    define( 'TITLE',            'Elliot Wright' );
    define( 'SESSION_COOKIE',   'ew180_sessuid' );


    //--------------------------------------------------------------------------
    // Begin Building Website:
    //--------------------------------------------------------------------------

    /**
     * Timezone Configuration:
     */
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

    /**
     * Require required files...
     */
    require( 'handlers/db.handler.php' );
    require( 'handlers/template.handler.php' );

    /**
     * Begin Initialisation:
     */
    DbHandler::Connect();               // Create database instance
    $Template = new TemplateHandler;    // Create template instance
