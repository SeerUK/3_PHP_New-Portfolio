<?php

	/**
	 * Home Module.
	 *
	 * Handles setting up all the pages in the 'Home' module.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	class HomeUi extends TemplateAbstract
	{

		protected function _home()
		{
			//$this->_authHandler->requirePermission( 'Modules.Admin.Home', $this->_authHandler->userGroup );

			/* Pre-template Setup:
			 * =================== */
			$feedHandler  = new FeedHandler;
			$feedHandler->parseFeed( new GithubParser( 'SeerUK' ) );

			/* Template Setup:
			 * =============== */
			$this->_templateEngine->caching = false;

			$this->_templateEngine->Assign( 'strPageTitle',         'Home' );
			$this->_templateEngine->Assign( 'feed',                 $feedHandler->getFeed( 8 ) );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation', Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Templates/Modules/Root/Root.tpl' );
		}

		protected function _skills()
		{
			/* Template Setup:
			 * ============== */
			$this->_templateEngine->caching = false;

			$this->_templateEngine->Assign( 'strPageTitle',         'Skills' );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation', Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Templates/Modules/Root/Skills.tpl' );
		}

		protected function _portfolio()
		{
			/* Template Setup:
			 * =============== */
			$this->_templateEngine->caching = false;

			$this->_templateEngine->Assign( 'strPageTitle',         'Portfolio' );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation', Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Templates/Modules/Root/Portfolio.tpl' );
		}

		protected function _contact()
		{
			/* Template Setup:
			 * ============== */
			$this->_templateEngine->caching = false;

			$this->_templateEngine->Assign( 'strPageTitle',         'Contact' );
			$this->_templateEngine->Assign( 'arrPrimaryNavigation', Common::getPrimaryNav() );

			$this->_templateEngine->Display( 'Templates/Modules/Root/Contact.tpl' );
		}
	}
