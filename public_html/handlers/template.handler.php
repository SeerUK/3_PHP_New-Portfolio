<?php

    /**
     * Template Handler
     *
     * @current system  Smarty 3.1.11
     * @desc            Handles preparation of template files based upon the URL
     *                  and sets up the page using the template engine specified
     *                  above.
     *
     */

    /**
     * Require the current template system:
     */
    require_once( 'template.libs/Smarty.class.php' );
    require_once( 'session.handler.php' );
    require_once( 'auth.handler.php' );

    /**
     * TemplateHandler Main Class:
     */
    class TemplateHandler
    {

        public $strModule;
        public $strInvoke;
        public $objInstance;

        public static $objSession;

        public function __construct()
        {

            $this->ValidateURI();

        }

        /**
         * Returns current template handler, must be the name of the main class
         * for the template system.
         */
        public static function GetHandler()
        {
            return 'Smarty';
        }

        /**
         * Redirect to appropriate error page and halt execution of script:
         */
        public static function HTTPError($intErrCode)
        {

            header( 'Location: ' . ROOT . '?module=Error&invoke=' . $intErrCode );
            exit;

        }

        /**
         * Validates and sanitizes the URL elements needed for templates to be
         * displayed properly.
         */
        private function ValidateURI()
        {

            /**
             * We will always only have 'module' and 'invoke'
             */
            if ( isset( $_GET['module'] ) && isset( $_GET['invoke'] ) )
            {
                $this->strModule = $_GET['module'];
                $this->strInvoke = $_GET['invoke'];

                /**
                 * URI template values must be alphanumeric.
                 */
                if ( !ctype_alnum( $this->strModule ) || !ctype_alnum( $this->strInvoke ) )
                {
                    $this::HTTPError('404');
                }

                /**
                 * Verify Existance of module and invokation... test invoke:
                 */
                if ( file_exists( 'modules/' . $this->strModule . '.module.class.php' ) )
                {
                    require_once( 'modules/' . $this->strModule . '.module.class.php' );

                    $strClass = $this->strModule . 'UI';
                    $this->objInstance = new $strClass($this->strInvoke);
                }
                else
                {
                    $this::HTTPError('404');
                }
            }
            else
            {
                if ( !isset( $_GET['module'] ) && !isset( $_GET['invoke'] ) )
                {
                    require_once( 'modules/Root.module.class.php' );
                    $this->instance = new RootUI('Root');
                }
                elseif ( !isset( $_GET['module'] ) || !isset( $_GET['invoke'] ) )
                {
                    $this::HTTPError('404');
                }
            }

        }

    }

    /**
     * Abstract base class to control the module classes:
     *
     * Should be extended in every module class to ensure correct
     * functionality.
     */
    abstract class TemplateReq extends TemplateHandler
    {

        /**
         * Engine calls the current template handler
         */
        protected $objEngine;

        /**
         * Check the invokation, prepare it for building:
         */
        public function __construct( $strInvoke )
        {

            if ( is_numeric( substr( $strInvoke, 1 ) ) )
            {
                $strInvoke = 'n' . $strInvoke;
            }

            if ( !method_exists( $this, $strInvoke ) )
            {
                TemplateHandler::HTTPError('404');
            }
            else
            {
                $strHandler = TemplateHandler::GetHandler();
                $this->objEngine = new $strHandler;
                $this->$strInvoke();
            }

        }

    }
