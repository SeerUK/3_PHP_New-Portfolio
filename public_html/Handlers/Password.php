<?php

    /**
     * Password Handler
     *
     * Handles hashing and checking passwords.
     *
     * @category SeerUK
     * @package  3_PHP_New-Portfolio
     * @version  0.1-alpha
     * @since    0.1-alpha
     *
     */

    require_once( 'Libs/Password/PasswordHash.php' );

    class PasswordHandler
    {

        /**
         * Hashes the given password into a very secure encrypted form
         * @param  [string] $password [Password to be encrypted]
         * @return [string]
         */
        public static function getHash( $password )
        {
            $hasher = new PasswordHash( 8, false );
            return $hasher->HashPassword( $password );
        }

        /**
         * Checks the given password against the hashed value stored in the
         * database to verify validity
         * @param [string] $password [Password to check validity of]
         * @param [string] $hash     [Password hash to compare against]
         */
        public static function getIsValid( $password, $hash )
        {
            $hasher = new PasswordHash( 8, false );
            return $hasher->CheckPassword( $password, $hash );
        }

    }
