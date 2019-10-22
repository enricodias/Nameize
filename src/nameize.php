<?php

namespace enricodias;

class Nameize
{
	
	private $_allowedCharacters = array(' ', "'", '-');
	
	public function __construct($allowedCharacters = null) {
		
		if ($allowedCharacters !== null) $this->setAllowedCharacters($allowedCharacters);

		return $this;

	}
	
	public function setAllowedCharacters($characters) {

		if (!is_array($characters)) $characters = array($characters);

		$characters[] = ' '; // space is always used
		$characters = array_unique($characters);

		$this->_allowedCharacters = $characters;

	}

	public function name($name) {

		$string = mb_strtolower($name, 'UTF-8');
		
		if (is_array($this->_allowedCharacters) && !empty($this->_allowedCharacters)) {
			
			foreach ($this->_allowedCharacters as $char) {
				
				if (stripos($string, $char) !== false) {
					
					$mend = '';
					$split = explode($char, $string);
					
					if ($char == ' ') {
						
						foreach ($split as $temp) {
							
							if (strlen($temp) > 3) $mend .= self::ucFirst($temp).$char;
							else $mend .= $temp.$char;
							
						}
						
					} else foreach ($split as $temp) $mend .= self::ucFirst($temp).$char;
					
					$string = substr($mend, 0, -1);
					
				}
				
			}
			
		}

		$this->_processedName = self::ucFirst($string);

		return $this->_processedName;
		
	}

	private static function ucFirst($string) {
		
		$string = mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
		
		return $string;
	
	}

}
