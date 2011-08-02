<?php

########################################################################
# Extension Manager/Repository config file for ext "hype_html5".
#
# Auto generated 02-08-2011 17:41
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Hype HTML5',
	'description' => 'Brings the future to TYPO3. Content is rendered using appropriate HTML5 elements using less wraps but useful class names.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '1.2.1',
	'dependencies' => 'css_styled_content',
	'conflicts' => 'html5meta_t3lib_pagerenderer,html5_kickstart,html5_readykit,html5boilerplate',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Thomas "Thasmo" Deinhamer',
	'author_email' => 'thasmo@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.4.0-4.6.99',
			'css_styled_content' => '0.0.0-0.0.0',
		),
		'conflicts' => array(
			'html5meta_t3lib_pagerenderer' => '0.0.0-0.0.0',
			'html5_kickstart' => '0.0.0-0.0.0',
			'html5_readykit' => '0.0.0-0.0.0',
			'html5boilerplate' => '0.0.0-0.0.0',
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:20:{s:12:"ext_icon.gif";s:4:"6226";s:17:"ext_localconf.php";s:4:"9778";s:14:"ext_tables.php";s:4:"967b";s:10:"readme.txt";s:4:"2e2b";s:56:"Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php";s:4:"8523";s:46:"Classes/Hook/class.user_hypehtml5_tslib_fe.php";s:4:"435a";s:43:"Classes/XClass/class.ux_t3lib_parsehtml.php";s:4:"eb21";s:38:"Configuration/TypoScript/constants.txt";s:4:"d1d5";s:34:"Configuration/TypoScript/setup.txt";s:4:"e555";s:42:"Configuration/TypoScript/CSC/constants.txt";s:4:"0589";s:42:"Configuration/TypoScript/CSC/editorcfg.txt";s:4:"6f06";s:38:"Configuration/TypoScript/CSC/setup.txt";s:4:"9e53";s:44:"Configuration/TypoScript/HTML5/constants.txt";s:4:"c0ca";s:40:"Configuration/TypoScript/HTML5/setup.txt";s:4:"dd9a";s:48:"Configuration/TypoScript/HTML5/Parsing/setup.txt";s:4:"f94a";s:33:"Resources/Public/Media/_.htaccess";s:4:"9119";s:42:"Resources/Public/Media/Script/modernizr.js";s:4:"4a8a";s:14:"doc/manual.pdf";s:4:"5329";s:14:"doc/manual.sxw";s:4:"4d96";s:14:"doc/manual.txt";s:4:"3a24";}',
	'suggests' => array(
	),
);

?>