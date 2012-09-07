<?php

    /**
     * Password Handler
     *
     * Handles hashing and checking passwords.
     *
     * @package [SeerUK/3_PHP_New-Portfolio]
     * @since   [v0.1-alpha]
     *
     */

    require_once( 'password.libs/PasswordHash.php' );

    class PasswordHandler
    {

        /**
         * Hashes the given password into a very secure encrypted form
         * @param [string] $strPassword [Password to be encrypted]
         * @return [string]
         */
        public static function Hash( $strPassword )
        {

            $objHasher = new PasswordHash(8, false);
            return $objHasher->HashPassword( $strPassword );

        }

        /**
         * Checks the given password against the hashed value stored in the
         * database to verify validity
         * @param [string] $strPassword [Password to check validity of]
         * @param [string] $strHash     [Password hash to compare against]
         */
        public static function Check( $strPassword, $strHash )
        {
            $objHasher = new PasswordHash(8, false);
            return $objHasher->CheckPassword($strPassword, $strHash);
        }

    }
