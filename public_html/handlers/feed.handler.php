<?php

    /**
     * Feed Handler
     *
     * @desc            Handles parsing various feeds. Lots of TODO features
     *                  here...
     *
     * @todo            Compile list of feeds to read from from database
     */

    /**
     * Feed handler main class
     */
    class FeedHandler
    {

        /* Let all of the functions in our instance access the feed...
         * =========================================================== */
        private $arrFeed = array();

        /* The source of a feed can be either an XML file or plain XML in a
         * string. Each parser will handle the data as it needs to. Error
         * handling happens within each of the parsers so that if a single
         * parser fails to get their feed information it doesn't affect the
         * rest of the script.
         *
         * Errors are logged on a per-parser basis. See Parse_{type}.
         *
         * @param       The source of the feed. Either XML in a string or
         *              an XML file.
         * @param       The type so that the parser can decide which
         *              function to use to parse the feed.
         * @return      Void
         * ================================================================ */
        public function Parse( $strSource, $strType )
        {
            /* Lets be more secure in how we handle this...
             * ============================================ */
            switch( $strType )
            {
                case 'github':
                    @$this->Parse_GitHub( $strSource );
                    break;
                default:
                    break;
            }
        }

        /* Parse GitHub Atom Files...
         *
         * @param       The source input. Must be an atom file. Usually from
         *              Github.
         * @return      Void
         * ========================== */
        private function Parse_GitHub( $strSource )
        {
            $xml = simplexml_load_file( $strSource );

            if( $xml )
            {
                $arrFeed = array();

                foreach( $xml->entry as $entry )
                {
                    /* TODO: Try work this one out with REGEX!
                     * ======================================= */
                    $strContent = str_replace( '/SeerUK', 'https://www.github.com/SeerUK', $entry->content );
                    $strContent = str_replace( 'https://github.comhttps://www.github.com', 'https://www.github.com', $strContent );
                    $strContent = str_replace( 'https://www.github.comhttps://www.github.com', 'https://www.github.com', $strContent );

                    $timTimestamp = str_replace( 'T', ' ', $entry->updated );
                    $timTimestamp = str_replace( 'Z', '', $timTimestamp );

                    $timTimestamp = strtotime( $timTimestamp );
                    $timTimestamp = date( 'D, jS F Y - g:ia', $timTimestamp );

                    $arrFeed[] = array( 'content'   => $strContent
                                      , 'type'      => 'Github'
                                      , 'timestamp' => $timTimestamp );

                }

                $this->arrFeed = array_merge_recursive( $this->arrFeed, $arrFeed );
            }
            else
            {
                error_log( '[Feed Handler::Github] Failed to load feed.' );
            }
        }

        /* Gets the merged feed array after sorting it via the timestamp with a
         * specified limit.
         *
         * @param       Limits the number of entries returned by the function.
         * @return      Array
         * ==================================================================== */
        public function ReturnFeed( $intLimit = false )
        {
            $arrReturn = array();

            foreach( $this->arrFeed as $strEntry )
            {
                if( $intLimit )
                {
                    $arrReturn[] = $strEntry;
                    $intLimit = $intLimit - 1;
                    if( $intLimit == 0 )
                    {
                        break;
                    }
                }
                else
                {
                    $arrReturn[] = $strEntry;
                }
            }

            /* Sort the array by time before returning...
             * ========================================== */
            $this->SortFeed($arrReturn, 'timestamp');

            return $arrReturn;
        }

        /* Sorts a multidimensional array with 2 levels by the selected key in
         * sub-arrays. (i.e. $array[0]['timestamp']).
         *
         * @param       The array to be sorted.
         * @param       The key we're sorting by in the sub-arrays.
         * @param       (Optional) Sorting direction. Defaults to descending.
         * @return      Void
         */
        public function SortFeed( &$arrFeed, $strColumn, $strDirection = SORT_DESC )
        {
            $arrSortCol = array();
            foreach( $arrFeed as $strKey => $arrRow)
            {
                $arrSortCol[$strKey] = $arrRow[$strColumn];
            }

            $result = array_multisort( $arrSortCol, $strDirection, $arrFeed);
        }

    }
