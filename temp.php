<?php
///////////////////////////////////////////////////////////////
//
//		Author: spaceshiptrooper
//		Contact: https://www.sitepoint.com/community/u/spaceshiptrooper
//		Copyright: 2024
//		Version: 0.1
//		File Created: 11/3/2024 at 1:46 A.M.
//		File Last Updated: 11/3/2024 at 7:19 P.M.
//
///////////////////////////////////////////////////////////////

class Convert {
	/**
	 * Converts supplied input to Celsius
	 * 
	 * @param float|string  $temp
	 * 
	 * @return string
	 */
	public function toCelsius(float|string $temp): string {
		if(strpos($temp, 'C') !== false) {
			return 'Please provide a valid temperature in Fahrenheit. You cannot convert Fahrenheit to Fahrenheit using the toCelsius() method because it doesn\'t make sense.';
		} else {
			// Example: (70°F − 32) × 5/9 = 21.111°C
			return round(((strtr($temp, ['°F' => ''])-32)*(5/9)), 2) . '°C';
		}
	}

	/**
	 * Converts supplied input to Fahrenheit
	 * 
	 * @param float|string  $temp
	 * 
	 * @return string
	 */
	public function toFahrenheit(float|string $temp): string {
		if(strpos($temp, 'F') !== false) {
			return 'Please provide a valid temperature in Celsius. You cannot convert Celsius to Celsius using the toFahrenheit() method because it doesn\'t make sense.';
		} else {
			// Example: (70°C × 9/5) + 32 = 158°F
			return round(((strtr($temp, ['°C' => ''])*(9/5))+32), 2) . '°F';
		}
	}
}

$temp = new Convert();
print $temp->toCelsius(70) . "\r\n";
print $temp->toFahrenheit(21.11) . "\r\n";

// You can also pass in string variations
/*
print $temp->toFahrenheit('21.11°C');
*/