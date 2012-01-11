<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2011 Kasper Skårhøj (kasperYYYY@typo3.com)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

class ux_tslib_fe extends tslib_fe {

 	/**
	 * Processes the INTinclude-scripts and substitue in content.
	 *
	 * @param	array		$INTiS_config: $GLOBALS['TSFE']->config['INTincScript'] or part of it
	 * @return	void
	 * @see		INTincScript()
	 */
	protected function INTincScript_process($INTiS_config) {
		$GLOBALS['TT']->push('Split content');
		$INTiS_splitC = explode('<!--INT_SCRIPT.',$this->content);			// Splits content with the key.
		$this->content = '';
		$GLOBALS['TT']->setTSlogMessage('Parts: '.count($INTiS_splitC));
		$GLOBALS['TT']->pull();

		foreach($INTiS_splitC as $INTiS_c => $INTiS_cPart)	{
			if (substr($INTiS_cPart,32,3)=='-->')	{	// If the split had a comment-end after 32 characters it's probably a split-string
				$INTiS_key = 'INT_SCRIPT.'.substr($INTiS_cPart,0,32);
				$GLOBALS['TT']->push('Include '.$INTiS_config[$INTiS_key]['file'],'');
				$incContent='';
				if (is_array($INTiS_config[$INTiS_key]))	{
					$INTiS_cObj = unserialize($INTiS_config[$INTiS_key]['cObj']);
					/* @var $INTiS_cObj tslib_cObj */
					$INTiS_cObj->INT_include=1;
					switch($INTiS_config[$INTiS_key]['type'])	{
						case 'SCRIPT':
							$incContent = $INTiS_cObj->PHP_SCRIPT($INTiS_config[$INTiS_key]['conf']);
						break;
						case 'COA':
							$incContent = $INTiS_cObj->COBJ_ARRAY($INTiS_config[$INTiS_key]['conf']);
						break;
						case 'FUNC':
							$incContent = $INTiS_cObj->USER($INTiS_config[$INTiS_key]['conf']);
						break;
						case 'POSTUSERFUNC':
							$incContent = $INTiS_cObj->callUserFunction($INTiS_config[$INTiS_key]['postUserFunc'], $INTiS_config[$INTiS_key]['conf'], $INTiS_config[$INTiS_key]['content']);
						break;
					}
				}

				if($incContent && $this->doXHTML_cleaning() != 'output') {
					$XHTML_clean = t3lib_div::makeInstance('t3lib_parsehtml');
					$incContent = $XHTML_clean->XHTML_clean($incContent);
				}

				$this->content.= $this->convOutputCharset($incContent,'INC-'.$INTiS_c);
				$this->content.= substr($INTiS_cPart,35);
				$GLOBALS['TT']->pull($incContent);
			} else {
				$this->content.= ($INTiS_c?'<!--INT_SCRIPT.':'').$INTiS_cPart;
			}
		}
	}
}

?>