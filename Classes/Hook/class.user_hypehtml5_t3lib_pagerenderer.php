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
	 * Adds modernizr HTML5 support for browsers
	 */
	public function renderPreProcess($parameters, $renderer) {

		if(!$parameters['jsLibs']['modernizr'] &&
		   in_array($GLOBALS['TSFE']->config['config']['doctype'], array('html5', 'html_5'))) {

			$parameters['jsLibs']['modernizr'] = array(
				'file' => 'typo3conf/ext/hype_html5/Resources/Public/Media/Script/modernizr.js',
				'type' => 'text/javascript',
				'section' => 1,
				'compress' => FALSE,
				'forceOnTop' => TRUE
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

		//var_dump($parameters);
	}
}

?>