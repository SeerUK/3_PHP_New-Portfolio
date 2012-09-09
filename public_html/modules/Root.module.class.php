<?php

	/**
	 * Root Module.
	 *
	 * Handles setting up all the pages in the 'Root' module.
	 *
	 * @package [SeerUK/3_PHP_New-Portfolio]
	 * @since 	[v0.1-alpha]
	 *
	 */

	require_once( 'classes/Common.class.php' );

	class RootUI extends TemplateReq
	{

		protected function Root()
		{
			/* Pre-template Setup:
			 * =================== */
			$objFeed = new FeedHandler;
			$objFeed->Parse( 'SeerUK','github' );
			//$objFeed->Parse( 'SeerUK.atom','github' );

			/* Template Setup:
			 * =============== */
			$this->objEngine->caching = false;
			$this->objEngine->Assign( 'strPageTitle',           'Home' );
			$this->objEngine->Assign( 'arrFeed',                $objFeed->ReturnFeed(8) );
			$this->objEngine->Assign( 'arrPrimaryNavigation',   GenericCommon::GetPrimaryNav() );

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
			$this->objEngine->Assign( 'arrPrimaryNavigation',   GenericCommon::GetPrimaryNav() );

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
			$this->objEngine->Assign( 'arrPrimaryNavigation',   GenericCommon::GetPrimaryNav() );

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
			$this->objEngine->Assign( 'arrPrimaryNavigation',   GenericCommon::GetPrimaryNav() );

			$this->objEngine->Display( 'modules/templates/Root/Contact.tpl' );
		}
	}
