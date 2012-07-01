<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# SETUP

# Page TSConfig
t3lib_extMgm::addPageTSConfig('
	TCEFORM {
		tt_content {
			text_properties.disabled = 1
			text_align.disabled = 1
			text_color.disabled = 1
			text_face.disabled = 1
			text_size.disabled = 1
			image_frames.disabled = 1

			CType.removeItems = rte,script,splash,swfobject,qtobject,multimedia,search
			imageorient.types.image.removeItems = 8,9,10,17,18,25,26
		}
	}
');

# Content Rendering
if(is_array($GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'])) {
	array_push($GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'], 'hypehtml5/Configuration/TypoScript/Frontend/');
} else {
	$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'] = array(
		'hypehtml5/Configuration/TypoScript/Frontend/',
	);
}

# TYPO3 4.5
if(t3lib_div::int_from_ver(TYPO3_version) < 4006000) {

	# Login
	t3lib_extMgm::addTypoScript(
		$_EXTKEY,
		'setup',
		'tt_content.login = COA',
		43
	);
}



# HOOKS

# Frontend
if(TYPO3_MODE == 'FE') {

	# TSLib Frontend
	$GLOBALS['TYPO3_CONF_VARS']['FE']['XCLASS']['tslib/class.tslib_fe.php'] = t3lib_extMgm::extPath('hype_html5', 'Classes/XClass/class.ux_tslib_fe.php');
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['configArrayPostProc'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_tslib_fe.php:user_hypehtml5_tslib_fe->configArrayPostProc';

	# Page Renderer
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-postProcess'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php:user_hypehtml5_t3lib_pagerenderer->renderPostProcess';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php:user_hypehtml5_t3lib_pagerenderer->renderPreProcess';

	# HTML Parser
	$GLOBALS['TYPO3_CONF_VARS']['FE']['XCLASS']['t3lib/class.t3lib_parsehtml.php'] = t3lib_extMgm::extPath('hype_html5', 'Classes/XClass/class.ux_t3lib_parsehtml.php');
}

?>