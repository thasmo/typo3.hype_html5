<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# TYPOSCRIPT

# Extension
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Hype HTML5');

# Content Rendering
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/4.7/', 'HTML5 Content Rendering (TYPO3 4.7)');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/4.6/', 'HTML5 Content Rendering (TYPO3 4.6)');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/4.5/', 'HTML5 Content Rendering (TYPO3 4.5)');


# TABLES

# Content
$columns = array(
	'tx_hypehtml5_link' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:hype_html5/Resources/Private/Language/locallang_db.xml:tt_content.tx_hypehtml5_link',
		'config' => array(
			'type' => 'check',
			'items' => array(
				'1'	=> array(
					'0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
				),
			),
		),
	),
);

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $columns, 1);
t3lib_extMgm::addFieldsToPalette('tt_content', 'header', 'tx_hypehtml5_link', 'after:header_link');
t3lib_extMgm::addFieldsToPalette('tt_content', 'headers', 'tx_hypehtml5_link', 'after:header_link');

?>