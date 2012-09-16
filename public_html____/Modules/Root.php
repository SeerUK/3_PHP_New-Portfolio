<?php

	/**
	 * Root Module.
	 *
	 * Handles setting up all the pages in the 'Root' module.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	class RootUi extends TemplateAbstract
	{

		protected function _root()
		{
			/* Pre-template Setup:
			 * =================== */
			$feedHandler = new FeedHandler;
			$feedHandler->Parse( 'SeerUK','github' );

			/* Template Setup:
			 * =============== */
			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle',           'Home' );
			$this->_templateEngine->Assign( 'arrFeed',                $feedHandler->returnFeed( 8 ) );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation',   Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Modules/Templates/Root/Root.tpl' );
		}

		protected function _skills()
		{
			/* Template Setup:
			 * ============== */
			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle',           'Skills' );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation',   Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Modules/Templates/Root/Skills.tpl' );
		}

		protected function _portfolio()
		{
			/* Template Setup:
			 * =============== */
			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle',           'Portfolio' );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation',   Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Modules/Templates/Root/Portfolio.tpl' );
		}

		protected function _contact()
		{
			/* Template Setup:
			 * ============== */
			$this->_templateEngine->caching = false;
			$this->_templateEngine->Assign( 'strPageTitle',           'Contact' );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation',   Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Modules/Templates/Root/Contact.tpl' );
		}
	}
