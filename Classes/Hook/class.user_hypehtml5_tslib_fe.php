<?php

class user_hypehtml5_tslib_fe {

	/**
	 * Puts configuration to the first element
	 */
	public function configArrayPostProc($parameters, $renderer) {

		if($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_hypehtml5.']) {
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