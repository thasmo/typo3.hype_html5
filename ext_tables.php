<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');



# TYPOSCRIPT

# Default
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/CSC/', 'CSS Styled Content, HTML5');

# Experimental
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/HTML5/', 'Experimental HTML5');

?>