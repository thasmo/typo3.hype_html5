<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# HOOKS

# Page renderer
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-postProcess'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php:user_hypehtml5_t3lib_pagerenderer->renderPostProcess';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][$_EXTKEY] = 'EXT:' . $_EXTKEY . '/Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php:user_hypehtml5_t3lib_pagerenderer->renderPreProcess';

?>