<?php

    /**
     * Session Handler
     *
     * @desc            Handles user sessions, allowing the authentication class
     *                  to use the user values and set up permissions.
     *
     */

    /**
     * Password handler main class
     */
    class SessionHandler
    {

        public static function Create( $strUserName, $strUserPassHash )
        {

            /**
             * Initiate PHP session
             */

            SessionHandler::CheckSession('2','127.0.0.1');
            exit;

            session_start();

            /**
             * Get values to put into session table
             */
            $intTimeStamp   = getDate();
            $intTimeStamp   = $intTimeStamp[0];
            $strSessionUID  = base64_encode( $strUserName . $strUserPassHash . $intTimeStamp );
            $strUserUID     = AuthHandler::ConvertUser( $strUserName );
            $strIPAddress   = DbHandler::Escape( $_SERVER['REMOTE_ADDR'] );

            /**
             * If the user that we are making a session for exists, make the session data:
             */
            if ( $strUserUID )
            {

                DbHandler::Query("
                        INSERT INTO
                            `tbl_session`
                                (`session_uid`
                                ,`session_user_uid`
                                ,`session_user_pass`
                                ,`session_start_date`
                                ,`session_ip`)
                        VALUES
                            ('$strSessionUID'
                            , '$strUserUID'
                            , '$strUserPassHash'
                            , '$intTimeStamp'
                            , '$strIPAddress')
                        ;");

                /**
                 * We also need to set up a cookie so that the client can
                 * request a session.
                 */
                setcookie( SESSION_COOKIE, $strSessionUID, time() + 18345600, COOKIE_PATH, COOKIE_DOMAIN );

            }

        }

        public static function CheckSession( $strSessionUID, $strSessionIP )
        {

            $arrSessions = DbHandler::FetchAll("
                        SELECT
                            *
                        FROM
                            `tbl_session`
                        WHERE
                            `session_user_uid` = '$strSessionUID',
                            `session_ip`       = '$strSessionIP'
                        ");

            var_dump($arrSessions);

        }

    }
