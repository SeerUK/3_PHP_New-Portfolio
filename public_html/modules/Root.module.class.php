<?php

    /**
     * Root Module.
     *
     * @desc            Handles the main website pages such as the homepage.
     *                  If this file doesn't exist or is invalid, we have a big
     *                  problem.
     *
     */

    /**
     * Require the CommonUI functions:
     */
    require_once( 'modules/Common.class.php' );

    class RootUI extends TemplateReq
    {

        //----------------------------------------------------------------------
        // Begin build functions:
        //----------------------------------------------------------------------

        /**
         * @invoke      Root
         *
         * @desc        Website Homepage.
         */
        protected function Root()
        {

            /* Pre-template setup:
             * =================== */
            $objFeed = new FeedHandler();
            $objFeed->Parse('https://github.com/SeerUK.atom','github');

            /* Template Setup:
             * =============== */
            $this->objEngine->caching = false;
            $this->objEngine->Assign( 'arrFeed',        $objFeed->ReturnFeed(6) );
            $this->objEngine->Assign( 'arrPN',          CommonUI::GetPrimaryNav(0) );
            $this->objEngine->Assign( 'strAvatarUrl',   CommonUI::GetAvatar( 'Seer', 120 ) );
            $this->objEngine->Assign( 'strPageTitle',   'Home' );


            $this->objEngine->Display( 'modules/templates/Root/Root.tpl' );

        }

    }
