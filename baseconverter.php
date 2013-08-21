<?php

class base_converter {

		private $characters;

		public function __construct($characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
			$this->characters = $characters;
		}

		// works with $input > = 0
		public function convert($input){
			// initialize some variables for base conversion
			$divisor = strlen($this->characters);
			$output = '';
			$dividend = $input;
			$remainder = 0;

			do {
				$quotient = floor($dividend / $divisor);
				$remainder = $dividend % $divisor;

				$output .= $this->characters[$remainder];
				$dividend = $quotient;

			} while ($dividend > 0 && $remainder > 0);

			//string is constructed backwards.  flip it.
			$output = strrev($output);
			return $output;
		}
}
