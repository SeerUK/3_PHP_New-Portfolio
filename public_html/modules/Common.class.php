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
         * Get Primary Navigation:
         *
         * @desc        Returns an array containing the elements that should
         *              be included in the primary navigation of the website.
         * @return      Array
         */
        public static function GetPrimaryNav()
        {
            /* TODO: Get this from the database:
             * ================================ */
            return array( 'Home' => '?module=root&invoke=root'
                        , 'Skills' => '?module=root&invoke=skills'
                        , 'Portfolio' => '?module=root&invoke=portfolio'
                        , 'Contact' => '?module=root&invoke=contact' );

        }

        public static function RelativeTime( $timTimestamp )
        {
            $timDifference = time() - $timTimestamp;
            $arrPeriods = array( "second", "minute", "hour", "day", "week","month", "years", "decade" );
            $arrLengths = array( "60","60","24","7","4.35","12","10" );

            if ( $timDifference > 0 )
            {
                $strEnding = "ago";
            }
            else
            {
                $timDifference = -$timDifference;
                $strEnding = "to go";
            }

            for( $j = 0; $timDifference >= $arrLengths[$j]; $j++ )
            {
                $timDifference /= $arrLengths[$j];
                $timDifference = round( $timDifference );
            }

            if( $timDifference != 1 ) $arrPeriods[$j].= "s";

            return "$timDifference $arrPeriods[$j] $strEnding";
        }

    }
