<?php

	/**
	 * Authentication Handler
	 *
	 * Handles authentication using the permissions system and session system.
	 * Users will only be able perform actions that require permissions if
	 * they are in a group with that permission and logged in. Guests also
	 * have permissions.
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	class AuthHandler {

		public function hasPermission( $permission, $groupId )
		{
			$nodes = explode( '.', $permission );
			$i     = count( $nodes ) - 1;

			$query = 'SELECT COUNT(p.strPermission) '
			       .   'FROM ' . DB_MAIN . '.ublPermission AS p '
			       .  "WHERE (p.strPermission = '$permission') ";

			$validPermisson = DbHandler::fetch( $query );

			if( $validPermisson < 1 )
			{
				return false;
			}

			/* Set up group permission query:
			 * ============================== */
			$query =     'SELECT COUNT(p.strPermission) '
			       .       'FROM ' . DB_MAIN . '.tblGroupPermissionMap AS gpm '
			       . 'INNER JOIN ' . DB_MAIN . '.ublPermission AS p ON p.intPermissionId = gpm.intPermissionId '
			       .      "WHERE (p.strPermission = '$permission' ";

			while( $i > 0 )
			{
				array_pop($nodes);
				$query.= 'OR p.strPermission = \'' . implode( '.', $nodes ) . '\'';

				$i = $i - 1;
			}

			$query.= 'OR p.strPermission = \'*\') '
			       .   "AND (intGroupId = $groupId) "
			       . 'LIMIT 1';

			$result = (bool) DbHandler::fetch( $query );
			return $result;
		}

		public function requirePermission( $permission, $groupId )
		{
			if( !$this->hasPermission( $permission, $groupId ) )
			{
				TemplateHandler::httpError('403');
			}
		}

	}
