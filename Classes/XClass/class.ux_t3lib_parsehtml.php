<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Thomas "Thasmo" Deinhamer (thasmo@gmail.com)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class ux_t3lib_parsehtml extends t3lib_parsehtml {

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
	 *
	 */
	public function processTag($value, $conf, $endTag, $protected = 0) {

		$tag = parent::processTag($value, $conf, $endTag, $protected);

		if(!$protected && !$endTag && $conf['xhtml'] &&
		   in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {

			switch(TRUE) {

				# Remove type attribute from scripts.
				case preg_match('~^<script~iU', $tag) && $this->settings['clean.']['removeScriptAttributes']:
					$tag = str_ireplace(' type="text/javascript"', '', $tag);
					break;

				# Remove type and media (all) attributes from stylesheet links.
				case preg_match('~^<link.*rel="stylesheet"~iU', $tag) && $this->settings['clean.']['removeStyleAttributes']:
					$tag = str_ireplace(array(' type="text/css"', ' media="all"'), '', $tag);
					break;

				# Remove width and height attributes from images.
				case preg_match('~<img~iU', $tag) && $this->settings['clean.']['removeImageAttributes']:
					$tag = preg_replace('~ (width|height)=".*"~iU', '', $tag);
					break;

				# Remove summary attribute from tables.
				case preg_match('~<table~iU', $tag) && $this->settings['clean.']['removeTableAttributes']:
					$tag = preg_replace('~ summary=".*"~iU', '', $tag);
					break;
			}
		}

		return $tag;
	}
}

?>