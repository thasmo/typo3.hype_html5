<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# TYPOSCRIPT

# Extension
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Hype HTML5');

# Content Rendering
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/CSC/', 'CSS Styled Content, HTML5');

?>