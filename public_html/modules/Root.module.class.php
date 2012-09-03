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
            /* Pre-template Setup:
             * =================== */
            $objFeed = new FeedHandler;
            //$objFeed->Parse( 'https://github.com/SeerUK.atom','github' );
            $objFeed->Parse( 'SeerUK.atom','github' );

            /* Template Setup:
             * =============== */
            $this->objEngine->caching = false;
            $this->objEngine->Assign( 'strPageTitle',           'Home' );
            $this->objEngine->Assign( 'arrFeed',                $objFeed->ReturnFeed(8) );
            $this->objEngine->Assign( 'arrPrimaryNavigation',   CommonUI::GetPrimaryNav() );

            $this->objEngine->Display( 'modules/templates/Root/Root.tpl' );
        }

        protected function Skills()
        {
            /* Pre-template Setup:
             * =================== */


            /* Template Setup:
             * ============== */
            $this->objEngine->caching = false;
            $this->objEngine->Assign( 'strPageTitle',           'Skills' );
            $this->objEngine->Assign( 'arrPrimaryNavigation',   CommonUI::GetPrimaryNav() );

            $this->objEngine->Display( 'modules/templates/Root/Skills.tpl' );
        }

        protected function Portfolio()
        {
            /* Pre-template Setup:
             * =================== */
            $objFeed = new FeedHandler;
            //$objFeed->Parse( 'https://github.com/SeerUK.atom','github' );
            $objFeed->Parse( 'SeerUK.atom','github' );

            /* Template Setup:
             * =============== */
            $this->objEngine->caching = false;
            $this->objEngine->Assign( 'strPageTitle',           'Portfolio' );
            $this->objEngine->Assign( 'arrFeed',                $objFeed->ReturnFeed(8) );
            $this->objEngine->Assign( 'arrPrimaryNavigation',   CommonUI::GetPrimaryNav() );

            $this->objEngine->Display( 'modules/templates/Root/Portfolio.tpl' );
        }

        protected function Contact()
        {
            /* Pre-template Setup:
             * =================== */


            /* Template Setup:
             * ============== */
            $this->objEngine->caching = false;
            $this->objEngine->Assign( 'strPageTitle',           'Contact' );
            $this->objEngine->Assign( 'arrPrimaryNavigation',   CommonUI::GetPrimaryNav() );

            $this->objEngine->Display( 'modules/templates/Root/Contact.tpl' );
        }
    }
