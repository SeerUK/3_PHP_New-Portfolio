<?php

	/**
	 * Error Handler
	 *
	 * Handles errors. (Duh)
	 *
	 * @category SeerUK
	 * @package  3_PHP_New-Portfolio
	 * @version  0.1-alpha
	 * @since 	 0.1-alpha
	 *
	 */

	class Errors
	{

		/**
		 * Array to store all the HTML errors in.
		 * @var array
		 */
		private $errors = array();

		/**
		 * Returns all of the HTML errors to display.
		 * @return [array] [All of the HTML errors stored]
		 */
		public function getHTMLErrors()
		{
			return $this->errors;
		}

		/**
		 * Adds an entry to the errors array.
		 * @param [string] $errorType    [The error type used as CSS style and message prefix]
		 * @param [string] $errorMessage [The error message]
		 */
		public function setHTMLError( $errorType, $errorMessage )
		{
			switch ( $errorType )
			{
				case 'info':
				case 'success':
				case 'error':
				case 'warning':
					break;
				default:
					$errorType = 'error';
					break;
			}

			$this->errors[] = array(
				'type'    => $errorType,
				'message' => $errorMessage
			);
		}

	}
