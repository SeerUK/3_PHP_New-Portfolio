<?php

    /**
     * Password Handler
     *
     * @current system  PHPass 0.3
     * @desc            Handles password hashing and checks.
     *
     */

    /**
     * Require the current password hashing library:
     */
    require_once( 'password.libs/PasswordHash.php' );

    /**
     * Password handler main class
     */
    class PasswordHandler
    {

        public static function Hash( $strPassword )
        {

            $objHasher = new PasswordHash(8, false);
            return $objHasher->HashPassword( $strPassword );

        }

        public static function Check( $strPassword, $strHash )
        {
            $objHasher = new PasswordHash(8, false);
            return $objHasher->CheckPassword($strPassword, $strHash);
        }

    }
