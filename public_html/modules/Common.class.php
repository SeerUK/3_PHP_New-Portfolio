<?php

    /**
     * Common Functions for all modules
     *
     * @desc            Prepares information for all modules. Resources that are
     *                  used throughout multiple MODULES of the website should
     *                  be placed here.
     *
     *                  All functions within this file must be static
     *
     */

    class CommonUI
    {

        /**
         * Get Avatar:
         *
         * @desc        Currently only supports Gravatar avatars. Easy to
         *              implement and for people to use if they already have
         *              a Gravatar account.
         * @return      String
         *
         */
        public static function GetAvatar( $strUserName, $intSize = false )
        {
            /**
             * TODO: Avatar types:
             */
            $strType = 'gravatar';
            switch ( $strType )
            {
                case 'gravatar':
                    $strEmail = 'wright.elliot@gmail.com';

                    $strUrl = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $strEmail ) ) );
                    if ( $intSize )
                    {
                        $strUrl.= "&s=" . $intSize;
                    }
                    return $strUrl;
            }

            return false;
        }

        /**
         * Get Primary Navigation:
         *
         * @desc        Returns an array containing the elements that should
         *              be included in the primary navigation of the website.
         * @return      Array
         */
        public static function GetPrimaryNav($bolAuthStatus)
        {

            $arrPNCommon = array( 'Home'       => ROOT,
                                    'Streamers'  => ROOT . '?module=root&invoke=streamers',
                                    'Forum'      => ROOT . '?module=forum&invoke=forum',
                                );

            $arrPNUnAuthed = array( 'Register'   => SECURE_ROOT . '?module=account&invoke=register' );
            $arrPNAuthed = array( 'My Account' => SECURE_ROOT . '?module=account&invoke=account' );

            switch ($bolAuthStatus) {

                case 0:
                    $arrPN = array_merge( $arrPNCommon, $arrPNUnAuthed );
                    return $arrPN;
                case 1:
                    $arrPN = array_merge( $arrPNCommon, $arrPNAuthed );
                    return $arrPN;
                default:
                    return false;

            }

        }

    }
