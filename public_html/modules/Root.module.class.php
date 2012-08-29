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
            echo '<div id="feed">';

            $objFeed = new FeedHandler();
            $objFeed->Parse(ROOT . 'SeerUK.atom','github');
            echo $objFeed->ReturnFeed(5);

            echo '</div>';


            $this->objEngine->caching = false;

            /* Page Variables:
             * =============== */
            $this->objEngine->Assign( 'strPageTitle', 'Home' );

            /* Navigation:
             * =========== */
            $this->objEngine->Assign( 'arrPN', CommonUI::GetPrimaryNav(0) );

            /* User Information:
             * ================= */
            $this->objEngine->Assign( 'strAvatarUrl', CommonUI::GetAvatar( 'Seer', 120 ) );

            $this->objEngine->Display( 'modules/templates/Root/Root.tpl' );

        }

    }
