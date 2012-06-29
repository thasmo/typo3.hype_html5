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

?>