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
    define( 'RAW_ROOT',         'ewp.pde.com' );
    define( 'ROOT',             'http://' . RAW_ROOT . '/' );
    define( 'SECURE_ROOT',      'https://' . RAW_ROOT . '/' );
    define( 'STATIC_ROOT',      '//' . RAW_ROOT . '/static/' );
    define( 'COOKIE_DOMAIN',    RAW_ROOT );
    define( 'COOKIE_PATH',      '/' );

    /**
     * File System Settings
     *
     * These Settings are specific to Smarty.
     */
    define( 'CACHE_DIR',        'C:/cache/' . RAW_ROOT . '/cache' );
    define( 'COMPILED_DIR',     'C:/cache/' . RAW_ROOT . '/compiled' );

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
