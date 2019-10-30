<?php

namespace enricodias;

/**
 * Nameize
 * 
 * A simple class to correctly capitalize full names.
 * 
 * @author Enrico Dias <enrico@enricodias.com>
 * @link   https://github.com/enricodias/nameize Github repository.
 */
class Nameize
{	
	/**
	 * Minimum word length in which a word will have its first character capitalized.
	 *
	 * @var int
	 */
	private $_minLength = 4;

	/**
	 * An array of allowed characters.
	 * 
	 * Those characters sinalizes that the next letter of a word should be in upper case.
	 *
	 * @var array
	 */
	private $_allowedCharacters = array(' ', "'", '-');
	
	/**
	 * Create a new Nameize instance and set allowed characters.
	 *
	 * @see    Nameize::$_allowedCharacters Definition of allowed characters.
	 * @param  string|array $allowedCharacters A single or an array of characters to be set as allowed characters.
	 * @return Nameize
	 */
	public function __construct($allowedCharacters = null)
	{
		if ($allowedCharacters !== null) $this->setAllowedCharacters($allowedCharacters);

		return $this;
	}

	/**
	 * Sets the minimum word length.
	 *
	 * @see    Nameize::$_minLength Definition of minimum word length.
	 * @param  int $length Minimum word length, must be between 1 and 5.
	 * @return Nameize
	 */
	public function minLength($length)
	{
		if (!is_int($length) || $length < 1 || $length > 5) return;

		$this->_minLength = $length;

		return $this;
	}

	/**
	 * Correctly capitalize a full name.
	 *
	 * @param  string $name Name to be capitalized.
	 * @return string
	 */
	public function name($name)
	{
		$string = mb_strtolower($name, 'UTF-8');
		
		if (is_array($this->_allowedCharacters) && !empty($this->_allowedCharacters)) {
			
			foreach ($this->_allowedCharacters as $char) {
				
				if (stripos($string, $char) !== false) {
					
					$mend = '';
					$split = explode($char, $string);
					
					if ($char == ' ') {
						
						foreach ($split as $temp) {
							
							if (strlen($temp) >= $this->_minLength) $mend .= self::ucFirst($temp).$char;
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
	
	/**
	 * Set one or more allowed characters.
	 *
	 * @see    Nameize::$_allowedCharacters Definition of allowed characters.
	 * @param  string|array $characters A single character or an array of characters.
	 * @return void
	 */
	public function setAllowedCharacters($characters)
	{
		if (!is_array($characters)) $characters = array($characters);

		$characters[] = ' '; // space is always used
		$characters = array_unique($characters);

		$this->_allowedCharacters = $characters;
	}

	/**
	 * Make a string's first character uppercase using mbstring.
	 *
	 * @param  string $string The input string.
	 * @return string
	 */
	private static function ucFirst($string)
	{
		$string = mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
		
		return $string;
	}
}