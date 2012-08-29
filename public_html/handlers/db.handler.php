<?php

    /**
     * Template Handler
     *
     * @current system  Dibi 2.0.1
     * @desc            Handles everything to do with the database. Connection,
     *                  queries, returning values in useful formats etc.
     *
     */

    /**
     * Require the current database abstraction layer:
     */
    require_once( 'db.libs/dibi.php' );

    /**
     * Database handler main class
     */
    class DbHandler
    {

        public static function Connect()
        {
            /**
             * Initialisde database connection upon class creation:
             */
            dibi::connect( array(
                'driver'    => DB_DRIVER,
                'host'      => DB_HOST,
                'username'  => DB_USER,
                'password'  => DB_PASS,
                'database'  => DB_DB,
            ));
        }

        public static function Escape($strEscape)
        {
            return mysql_real_escape_string($strEscape);
        }

        public static function Fetch($strQuery)
        {
            return dibi::fetchSingle($strQuery);
        }

        public static function FetchAll($strQuery)
        {
            return dibi::fetchAll($strQuery);
        }

        public static function FetchRow($strQuery)
        {
            return dibi::fetch($strQuery);
        }

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
