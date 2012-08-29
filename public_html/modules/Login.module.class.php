<?php

    /**
     * Login Module
     *
     * @desc            Controls all aspects of logging in. Not related to
     *                  authentication, just sets up the user session so that
     *                  the system can authenticate a user.
     *
     */

    require_once( 'handlers/password.handler.php' );

    /**
     * Main Login Class
     */
    class LoginUI extends TemplateReq
    {

        //----------------------------------------------------------------------
        // Begin build functions:
        //----------------------------------------------------------------------

        /**
         * @invoke      DoLogin
         *
         * @desc        Processes login requests. Does not actually display a
         *              page.
         */
        protected function DoLogin()
        {

            /**
             * Check we're actually being sent something..
             */
            if ( isset( $_POST['iptLoginUser'] ) )
            {

                /**
                 *Prepare user input for MySQL:
                 */
                $strUsername = DbHandler::Escape( $_POST['iptLoginUser'] );
                $strPassword = DbHandler::Escape( $_POST['iptLoginPass'] );

                /**
                 * Query Database:
                 */
                $strUserPassHash = DbHandler::Fetch("
                        SELECT
                            user_pass AS strUserPass
                        FROM
                            tbl_user
                        WHERE
                            user_name = '$strUsername'
                        ");

                /**
                 * If no use was found, exit here...
                 */
                if ( isset( $strUserPassHash ) )
                {
                    /**
                     * Check to see if password matches:
                     */
                    if ( PasswordHandler::Check( $strPassword, $strUserPassHash ) )
                    {
                        echo "Success!";
                        SessionHandler::Create( $strUsername, $strUserPassHash );
                        return true;
                    }
                    else
                    {
                        echo "Password doesn't match!";
                        return false;
                    }
                } else {
                    echo "No user found.";
                    return false;
                }

            }
            else
            {

                header( 'Location: ' . ROOT );
                exit;

            }

        }

    }
