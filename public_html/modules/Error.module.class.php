<?php

    /**
     * HTTP Error Module
     *
     * @desc            Prepares pages for HTTP errors, usually from requests in
     *                  scripts in our system (hopefully).
     *
     */

    class ErrorUI extends TemplateReq
    {

        //----------------------------------------------------------------------
        // Begin assignment and build functions:
        //----------------------------------------------------------------------

        /**
         * @invoke      404
         *
         * @desc        HTTP 404 page
         */
        protected function n404()
        {

            $this->objEngine->caching = true;
            $this->objEngine->cache_lifetime = 3600;

            $this->objEngine->Display( 'modules/templates/Error/404.tpl' );

        }

    }
