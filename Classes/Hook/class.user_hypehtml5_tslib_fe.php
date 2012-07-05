<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 1999-2011 Kasper Skårhøj (kasperYYYY@typo3.com)
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * A copy is found in the textfile GPL.txt and important notices to the license
 * from the author is found in LICENSE.txt distributed with these scripts.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 */
class user_hypehtml5_tslib_fe {

	/**
	 * @var array Holds the extension's configuration.
	 */
	protected $settings;

	/**
	 *
	 */
	public function __construct() {
		$this->settings = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_hypehtml5.'];
	}

	/**
	 * Puts configuration to the first element
	 */
	public function configArrayPostProc($parameters, $renderer) {

		if($this->settings['common.']['includeStylesFirst']) {
			$configuration = array();
			$configuration['tx_hypehtml5.'] = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_hypehtml5.'];
			unset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_hypehtml5.']);
			$configuration = array_merge($configuration, $GLOBALS['TSFE']->tmpl->setup['plugin.']);
			$GLOBALS['TSFE']->tmpl->setup['plugin.'] = $configuration;
			unset($configuration);
		}
	}
}

?>