<?php

/*
* Capitalize segments of a name, and put the rest into lower case
* $Object = new nameize\nameize();
* $Object->nameize("john o'grady-smith");     // returns John O'Grady-Smith
* nameize\nameize::format("joão da silva");   // returns João da Silva
* nameize\nameize::format("mArIa dAs DORES"); // returns Maria das Dores
*/

namespace nameize;

class nameize {
	
	private $_allowedCharacters = array();
	
	public function __construct($allowedCharacters = false) {
		
		$this->_allowedCharacters = self::filterArray($allowedCharacters);
		
	}
	
	public function nameize($name) {
		
		return self::process($name, $this->_allowedCharacters);
		
	}

	public static function format($name, $allowedCharacters = false) {
		
		return self::process($name, self::filterArray($allowedCharacters));
		
	}
	
	private static function process($name, $allowedCharacters) {

		$string = mb_strtolower($name, 'UTF-8');
		
		if (is_array($allowedCharacters) && !empty($allowedCharacters)) {
			
			foreach ($allowedCharacters as $char) {
				
				if (stripos($string, $char) !== false) {
					
					$mend = '';
					$a_split = explode($char, $string);
					
					if ($char == ' ') {
						
						foreach ($a_split as $temp2) {
							
							if (strlen($temp2) > 3) $mend .= self::mb_ucfirst($temp2).$char;
							else $mend .= $temp2.$char;
							
						}
						
					} else {
						
						foreach ($a_split as $temp2) $mend .= self::mb_ucfirst($temp2).$char;
						
					}
					
					$string = substr($mend, 0, -1);
					
				}
				
			}
			
		}
		
		return self::mb_ucfirst($string);
		
	}

	private static function mb_ucfirst($string) {
		
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