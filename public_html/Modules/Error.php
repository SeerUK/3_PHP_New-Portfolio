<?php

    /**
     * Error Module
     *
     * Contains all of the error page UI setup. Defaults are specified in the
     * template handler.
     *
     * @category SeerUK
     * @package  3_PHP_New-Portfolio
     * @version  0.1-alpha
     * @since    0.1-alpha
     *
     */

    class ErrorUi extends TemplateAbstract
    {

        protected function _404()
        {

            $this->_templateEngine->caching = true;
            $this->_templateEngine->cache_lifetime = 3600;

            $this->_templateEngine->Display( 'Modules/Templates/Error/404.tpl' );

        }

    }
