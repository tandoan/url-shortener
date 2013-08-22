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
}