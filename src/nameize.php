<?php

namespace enricodias;

class nameize {
	
	private $_allowedCharacters = array();
	
	public function __construct($allowedCharacters = null) {
		
		$this->_allowedCharacters = self::filterArray($allowedCharacters);
		
	}
	
	public function nameize($name) {
		
		return self::process($name, $this->_allowedCharacters);
		
	}

	public static function format($name, $allowedCharacters = null) {
		
		return self::process($name, self::filterArray($allowedCharacters));
		
	}
	
	private static function process($name, $allowedCharacters) {

		$string = mb_strtolower($name, 'UTF-8');
		
		if (is_array($allowedCharacters) && !empty($allowedCharacters)) {
			
			foreach ($allowedCharacters as $char) {
				
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
		
		return self::ucFirst($string);
		
	}

	private static function ucFirst($string) {
		
		$string = mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
		
		return $string;
	
	}
	
	private static function filterArray($array) {

		if (empty($array)) $array = array("'", '-');
		elseif (!is_array($array)) $array = array($array);

		$array[] = ' ';
		$array = array_unique($array);

		return $array;

	}

}

?>