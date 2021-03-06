<?php

########################################################################
# Extension Manager/Repository config file for ext "hype_html5".
#
# Auto generated 15-11-2012 23:31
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Hype HTML5',
	'description' => 'Brings the future to TYPO3. Content is rendered HTML5-friendly.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '1.6.4-dev',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author' => 'Thomas "Thasmo" Deinhamer',
	'author_email' => 'thasmo@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.4.0-4.7.99',
		),
		'conflicts' => array(
			'html5meta_t3lib_pagerenderer' => '0.0.0-0.0.0',
			'html5_kickstart' => '0.0.0-0.0.0',
			'html5_readykit' => '0.0.0-0.0.0',
			'html5boilerplate' => '0.0.0-0.0.0',
			'crt_bodytext_variables' => '0.0.0-0.0.0',
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:28:{s:12:"ext_icon.gif";s:4:"6226";s:17:"ext_localconf.php";s:4:"ccd9";s:14:"ext_tables.php";s:4:"6957";s:10:"readme.txt";s:4:"2e2b";s:30:"Classes/class.tx_hypehtml5.php";s:4:"ff10";s:56:"Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php";s:4:"2ce5";s:46:"Classes/Hook/class.user_hypehtml5_tslib_fe.php";s:4:"ac3d";s:43:"Classes/XClass/class.ux_t3lib_parsehtml.php";s:4:"7c20";s:36:"Classes/XClass/class.ux_tslib_fe.php";s:4:"18a0";s:32:"Configuration/FlexForm/Table.xml";s:4:"6547";s:38:"Configuration/TypoScript/constants.txt";s:4:"d346";s:34:"Configuration/TypoScript/setup.txt";s:4:"be52";s:47:"Configuration/TypoScript/Frontend/constants.txt";s:4:"440c";s:43:"Configuration/TypoScript/Frontend/setup.txt";s:4:"a321";s:43:"Resources/Private/Language/de.locallang.xlf";s:4:"6c5e";s:46:"Resources/Private/Language/de.locallang_db.xlf";s:4:"2e62";s:40:"Resources/Private/Language/locallang.xlf";s:4:"c203";s:40:"Resources/Private/Language/locallang.xml";s:4:"4376";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"5698";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"3024";s:45:"Resources/Public/Media/Script/chrome-frame.js";s:4:"848c";s:46:"Resources/Public/Media/Script/modernizr.min.js";s:4:"5021";s:44:"Resources/Public/Media/Script/respond.min.js";s:4:"135e";s:48:"Resources/Public/Media/Script/selectivizr.min.js";s:4:"a027";s:42:"Resources/Public/Media/Style/normalize.css";s:4:"ae13";s:14:"doc/manual.pdf";s:4:"4789";s:14:"doc/manual.sxw";s:4:"605d";s:14:"doc/manual.txt";s:4:"077c";}',
);

?>