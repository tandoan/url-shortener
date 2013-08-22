<?php
class BaseConverter {

		private $CharacterSet;

		public function __construct($CharacterSet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
			$this->CharacterSet = $CharacterSet;
		}

		// works with $Input > = 0
		public function Convert($Input){
			// initialize some variables for base conversion
			$Divisor = strlen($this->CharacterSet);
			$Output = '';
			$Dividend = $Input;
			$Remainder = 0;

			do {
				$Quotient = floor($Dividend / $Divisor);
				$Remainder = $Dividend % $Divisor;

				$Output .= $this->CharacterSet[$Remainder];
				$Dividend = $Quotient;

			} while ($Dividend > 0 && $Remainder > 0);

			//string is constructed backwards.  flip it.
			$Output = strrev($Output);
			return $Output;
		}

		// convert back to a base 10 integer
		public function ConvertBack($Key) {
			//initialize some variables
			$WorkingKey = (string)$Key;
			$WorkingKey = strrev($WorkingKey);
			$Output = '';
			$Base = strlen($this->CharacterSet);
			$InputLength = strlen($WorkingKey);
			$Exponent = ($InputLength-1);

			// base conversion, loop through the digits and sum the proper multiples
			do {
				$SearchChar = $WorkingKey[$Exponent];
				$Multiple = strpos($this->CharacterSet, $SearchChar);
				if(false !== $Multiple) {
					$Output +=  $Multiple * pow($Base, $Exponent);
				} else {
					//TODO: Throw some exception
				}

				$Exponent--;
			} while ($Exponent > -1);
			return $Output;
		}
}
