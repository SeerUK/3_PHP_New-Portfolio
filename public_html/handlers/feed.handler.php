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
         * Errors are logged.
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

            var_dump($this->arrFeed);
        }

        /* Parse GitHub Atom Files...
         * ========================== */
        private function Parse_GitHub( $strSource )
        {
            $xml = simplexml_load_file( 'ygbijk' );

            if($xml)
            {
                $arrFeed = array();

                foreach($xml->entry as $entry)
                {
                    /* TODO: Try work this one out with REGEX!
                     * ======================================= */
                    $strContent = str_replace( '/SeerUK', 'https://www.github.com/SeerUK', $entry->content );
                    $strContent = str_replace( 'https://github.comhttps://www.github.com', 'https://www.github.com', $strContent );
                    $strContent = str_replace( 'https://www.github.comhttps://www.github.com', 'https://www.github.com', $strContent );

                    $arrFeed[] = $strContent;

                }

                $this->arrFeed = array_merge_recursive( $this->arrFeed, $arrFeed );
            }
            else
            {
                error_log('[Feed Handler::Github] Failed to load feed.');
            }
        }

    }
