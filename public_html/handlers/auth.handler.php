<?php

    /**
     * Authentication Handler
     *
     * @desc            Handles authentication and sessions. Does not process
     *                  log in requests. All methods should be static.
     *
     */

    /**
     * Main Authentication Class:
     */
    class AuthHandler {

        public static function GetAuth()
        {



        }

        /**
         * Returns either a user ID or a user name dependant on input.
         *
         * @return      string
         * @param       $toID :: If set this must be the user NAME that is to be
         *              converted into a user ID.
         * @param       $toName :: If set this must be the user ID that is to be
         *              converted into a user NAME.
         */
        public static function ConvertUser( $toID = false, $toName = false )
        {

            /**
             * Store the values we return here.
             */
            $strReturn;

            if ( $toID != false && $toName == false )
            {
                /**
                 * Return the user ID for a given name.
                 */
                $strReturn = DbHandler::Fetch("
                    SELECT
                        `user_uid`
                    FROM
                        `tbl_user`
                    WHERE
                        `user_name` = '$toID'
                    ");

                if ( $strReturn != '' )
                {
                    return $strReturn;
                }
                else
                {
                    return false;
                }
            }
            elseif ( $toId == false && $toName != false )
            {
                /**
                 * Return the user name for a given ID.
                 */
                $strReturn = DbHandler::Fetch("
                    SELECT
                        `user_name`
                    FROM
                        `tbl_user`
                    WHERE
                        `user_uid` = '$toName'
                    ");

                if ( $strReturn != '' )
                {
                    return $strReturn;
                }
                else
                {
                    return false;
                }

            }
            return false;

        }

    }
