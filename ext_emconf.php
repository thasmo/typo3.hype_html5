<?php

########################################################################
# Extension Manager/Repository config file for ext "hype_html5".
#
# Auto generated 18-04-2012 23:00
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
	'version' => '1.6.0-dev',
	'priority' => 'top',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
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
	'_md5_values_when_last_written' => 'a:20:{s:12:"ext_icon.gif";s:4:"6226";s:17:"ext_localconf.php";s:4:"c5e4";s:14:"ext_tables.php";s:4:"e66e";s:10:"readme.txt";s:4:"2e2b";s:56:"Classes/Hook/class.user_hypehtml5_t3lib_pagerenderer.php";s:4:"411d";s:46:"Classes/Hook/class.user_hypehtml5_tslib_fe.php";s:4:"435a";s:43:"Classes/XClass/class.ux_t3lib_parsehtml.php";s:4:"2671";s:36:"Classes/XClass/class.ux_tslib_fe.php";s:4:"18a0";s:38:"Configuration/TypoScript/constants.txt";s:4:"d346";s:34:"Configuration/TypoScript/setup.txt";s:4:"be52";s:42:"Configuration/TypoScript/CSC/constants.txt";s:4:"2969";s:38:"Configuration/TypoScript/CSC/setup.txt";s:4:"af0e";s:45:"Resources/Public/Media/Script/chrome-frame.js";s:4:"848c";s:46:"Resources/Public/Media/Script/modernizr.min.js";s:4:"f671";s:44:"Resources/Public/Media/Script/respond.min.js";s:4:"135e";s:48:"Resources/Public/Media/Script/selectivizr.min.js";s:4:"a027";s:42:"Resources/Public/Media/Style/normalize.css";s:4:"2b6f";s:14:"doc/manual.pdf";s:4:"a270";s:14:"doc/manual.sxw";s:4:"f4ac";s:14:"doc/manual.txt";s:4:"0d75";}',
);

?>