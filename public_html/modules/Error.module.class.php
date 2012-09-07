<?php

    /**
     * Error Module
     *
     * Contains all of the error page UI setup. Defaults are specified in the
     * template handler.
     *
     * @package [SeerUK/3_PHP_New-Portfolio]
     * @since   [v0.1-alpha]
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
