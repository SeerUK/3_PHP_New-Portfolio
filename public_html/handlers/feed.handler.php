<?php

    /**
     * Feed Handler
     *
     * @desc            Handles parsing various feeds. Lots of TODO features
     *                  here...
     *
     * @todo            Compile list of feeds to read from from database
     * @todo            Merge feeds
     *
     */

    /**
     * Feed handler main class
     */
    class FeedHandler
    {

        /* Let all of the functions in our instance access the feed...
         * =========================================================== */
        private $strFeed;

        /* When making an instance of this class we should make it easy to
         * choose what feed type we're parsing and make this sort of a...
         * feed abstraction layer? The output before merging should always be
         * the same format.
         * ================================================================== */
        public function __construct( $source, $type )
        {
            $this->strFeed = $source;

            /* Lets be more secure in how we handle this...
             * ============================================ */
            switch( $type )
            {
                case github:
                    $this->Parse_GitHub();
                    break;
                default:
                    break;
            }
        }

        /* Parse GitHub Atom Files...
         * ========================== */
        private function Parse_GitHub()
        {

        }

    }
