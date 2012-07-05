<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# TYPOSCRIPT

# Extension
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Hype HTML5');

# Content Rendering
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/Frontend/', 'HTML5 Content Rendering');



# TABLES

if(!t3lib_extMgm::isLoaded('css_styled_content')) {

	# Content
	t3lib_div::loadTCA('tt_content');

	t3lib_extMgm::addPiFlexFormValue('*', 'FILE:EXT:hype_html5/Configuration/FlexForm/Table.xml', 'table');

	$TCA['tt_content']['types']['table']['showitem'] = 'CType;;4;;1-1-1, hidden, header;;3;;2-2-2, linkToTop;;;;4-4-4, --div--;LLL:EXT:cms/locallang_ttc.xml:CType.I.5, layout;;10;;3-3-3, cols, bodytext;;9;nowrap:wizards[table], text_properties, pi_flexform, --div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.access, starttime, endtime, fe_group';
	$TCA['tt_content']['columns']['section_frame']['config']['items'][0] = array('LLL:EXT:hype_html5/Resources/Private/Language/locallang_db.xml:tt_content.tx_cssstyledcontent_section_frame.I.0', '0');
	$TCA['tt_content']['columns']['section_frame']['config']['items'][9] = array('LLL:EXT:hype_html5/Resources/Private/Language/locallang_db.xml:tt_content.tx_cssstyledcontent_section_frame.I.9', '66');
}

?>