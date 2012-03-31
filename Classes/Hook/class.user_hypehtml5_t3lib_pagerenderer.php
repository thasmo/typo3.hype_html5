<?php

class user_hypehtml5_t3lib_pagerenderer {

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
				'rel' => 'stylesheet',
				'media' => 'all',
				'title' => '',
				'compress' => FALSE,
				'forceOnTop' => TRUE,
				'allWrap' => ''
			);
		}

		# add selectivizr.js
		if($this->settings['common.']['enableSelectivizr'] &&
		   in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {

			$parameters['jsLibs']['selectivizr'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/selectivizr.min.js',
				'type' => 'text/javascript',
				'section' => 1,
				'compress' => FALSE,
				'forceOnTop' => FALSE,
				'external' => FALSE,
				'excludeFromConcatenation' => TRUE,
				'disableCompression' => FALSE,
				'allWrap' => '<!--[if lt IE 9]>|<![endif]-->',
			);
		}

		# add respond.js
		if($this->settings['common.']['enableRespondJs'] &&
		   in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {

			$parameters['jsLibs']['respond'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/respond.min.js',
				'type' => 'text/javascript',
				'section' => 1,
				'compress' => FALSE,
				'forceOnTop' => FALSE,
				'external' => FALSE,
				'excludeFromConcatenation' => TRUE,
				'disableCompression' => FALSE,
				'allWrap' => '<!--[if lt IE 9]>|<![endif]-->',
			);
		}

		# add modernizr.js
		if($this->settings['common.']['enableModernizr'] &&
		   in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {

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
				'allWrap' => '<!--[if lt IE 7]>|<![endif]-->',
			);

			$parameters['jsFiles']['typo3conf/ext/hype_html5/Resources/Public/Media/Script/chrome-frame.js'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/chrome-frame.js',
				'type' => 'text/javascript',
				'section' => 2,
				'compress' => FALSE,
				'forceOnTop' => FALSE,
				'external' => FALSE,
				'excludeFromConcatenation' => FALSE,
				'allWrap' => '<!--[if lt IE 7]>|<![endif]-->',
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