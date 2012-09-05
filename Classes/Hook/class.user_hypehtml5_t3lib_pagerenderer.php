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
class user_hypehtml5_t3lib_pagerenderer {

	/**
	 * @var array Holds the extension's configuration.
	 */
	protected $settings;

	/**
	 * @var string Holds inline javascript code
	 */
	protected $inlineScript;

	/**
	 *
	 */
	public function __construct() {
		$this->settings = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_hypehtml5.'];
	}

	/**
	 * Adds Modernizr and Chrome Frame Installer
	 *
	 * @param array $parameters
	 * @param t3lib_PageRenderer $renderer
	 * @return void
	 */
	public function renderPreProcess($parameters, $renderer) {

		# add normalize.css
		if($this->settings['common.']['enableNormalize']) {
			$parameters['cssFiles']['typo3conf/ext/hype_html5/Resources/Public/Media/Style/normalize.css'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Style/normalize.css',
				'rel' => 'stylesheet',
				'media' => 'all',
				'title' => '',
				'compress' => FALSE,
				'forceOnTop' => TRUE,
				'allWrap' => ''
			);
		}

		# add selectivizr.js
		if($this->settings['common.']['enableSelectivizr'] && in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {
			$this->inlineScript .= 'if(/*@cc_on!@*/false){if(typeof Modernizr !== \'undefined\'){Modernizr.load(\'/typo3conf/ext/hype_html5/Resources/Public/Media/Script/selectivizr.min.js\');}}';
		}

		# add respond.js
		if($this->settings['common.']['enableRespondJs'] && in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {
			$this->inlineScript .= 'if(typeof Modernizr !== \'undefined\'){Modernizr.load({test: Modernizr.mq(\'only all\'), nope: \'/typo3conf/ext/hype_html5/Resources/Public/Media/Script/respond.min.js\'});}';
		}

		# add modernizr.js
		if($this->settings['common.']['enableModernizr'] && in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5')) && !is_array($parameters['jsLibs']['modernizr'])) {
			$parameters['jsLibs']['modernizr'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/modernizr.min.js',
				'type' => 'text/javascript',
				'section' => 1,
				'compress' => FALSE,
				'forceOnTop' => FALSE,
				'external' => FALSE,
				'excludeFromConcatenation' => FALSE,
				'disableCompression' => FALSE,
			);
		}

		# add chrome frame installer
		if($this->settings['common.']['installChromeFrame']) {
			$parameters['jsFiles']['//ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js'] = array(
				'file' => '//ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js',
				'type' => 'text/javascript',
				'section' => 2,
				'compress' => FALSE,
				'forceOnTop' => FALSE,
				'external' => TRUE,
				'excludeFromConcatenation' => FALSE,
				'disableCompression' => TRUE,
				'allWrap' => '<!--[if lt IE 8]>|<![endif]-->',
			);

			$parameters['jsFiles']['typo3conf/ext/hype_html5/Resources/Public/Media/Script/chrome-frame.js'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/chrome-frame.js',
				'type' => 'text/javascript',
				'section' => 2,
				'compress' => FALSE,
				'forceOnTop' => FALSE,
				'external' => FALSE,
				'excludeFromConcatenation' => FALSE,
				'allWrap' => '<!--[if lt IE 8]>|<![endif]-->',
			);
		}

		# add inline script
		if($this->inlineScript) {

			# generate file
			$filePath = TSpagegen::inline2TempFile($this->inlineScript, 'js');

			# add file
			$parameters['jsFiles'][$filePath] = array(
				'file' => $filePath,
				'type' => 'text/javascript',
				'section' => 2,
				'compress' => FALSE,
				'forceOnTop' => TRUE,
				'external' => FALSE,
				'excludeFromConcatenation' => FALSE,
				'disableCompression' => TRUE,
			);
		}
	}

	/**
	 * Adds the html5boilerplate html tag
	 */
	public function renderPostProcess($parameters, $renderer) {

		# doctype
		if(strlen(trim($this->settings['markup.']['doctype'])) > 0) {
			$parameters['xmlPrologAndDocType'] = trim($this->settings['markup.']['doctype']);
		}

		# html tag
		if(strlen(trim($this->settings['markup.']['htmlTag'])) > 0) {

			$htmlTag = $this->settings['markup.']['htmlTag'];
			$htmlTag = trim(str_replace("\t", '', $htmlTag));

			# language
			$languageToken = ($language = $renderer->getLanguage()) ? $language : 'en';
			$htmlTag = str_replace('{$language}', $languageToken, $htmlTag);

			# namespace
			$namespace = '';

			if(count($this->settings['markup.']['htmlTag.']['namespace.']) > 0) {

				foreach($this->settings['markup.']['htmlTag.']['namespace.'] as $token => $address) {
					$namespace .= ' xmlns:' . htmlentities($token, ENT_QUOTES, 'UTF-8') . '="' . htmlentities($address, ENT_QUOTES, 'UTF-8') . '"';
				}
			}

			$htmlTag = str_replace('{$namespace}', $namespace, $htmlTag);

			# set the tag
			$parameters['htmlTag'] = $htmlTag;
		}
	}
}

?>