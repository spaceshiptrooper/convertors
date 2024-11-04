<?php
///////////////////////////////////////////////////////////////
//
//		Author: spaceshiptrooper
//		Contact: https://www.sitepoint.com/community/u/spaceshiptrooper
//		Copyright: 2024
//		Version: 0.1
//		File Created: 11/3/2024 at 5:08 P.M.
//		File Last Updated: 11/3/2024 at 7:19 P.M.
//
///////////////////////////////////////////////////////////////

class Convert {
	/**
	 * Converts supplied cm to feet and inches
	 * 
	 * @param float|string  $height
	 * 
	 * @return string
	 */
	public function toFeetInch(float|string $height): string {
		if(strpos($height, '\'') !== false AND strpos($height, '"') !== false) {
			return 'Please provide a valid height in centimeters. You cannot convert feet and inches to feet and inches using the toFeetInch() method because it doesn\'t make sense.';
		} else {
			// Example: 171 ÷ 30.48 = 5.61 feet
			$height = (float)str_replace('/([A-Za-z]+)/is', '', $height); // Remove any characters from A-Z upper and lowercase. We only want numbers and decimals.
			$fullHeight = round(($height/30.48), 2);
			$explodedRemainder = explode('.', $fullHeight);
			$remainder = round((($explodedRemainder[1]/100)*12));
			return ($explodedRemainder[0] . '\'' . $remainder . '"');
		}
	}

	/**
	 * Converts supplied feet and inches to cm
	 * 
	 * @param float|string  $height
	 * 
	 * @return string
	 */
	public function toCm(float|string $height): string {
		if(strpos($height, 'cm') !== false) {
			return 'Please provide a valid height in feet and inches. You cannot convert centimeters to centimeters using the toCm() method because it doesn\'t make sense.';
		} else {
			// Example: ((5f × 12) + 7in) × 2.54 = 170.18cm
			$cm = 0;
			if(strpos($height, '.') !== false) {
				$explodedHeight = explode('.', $height);
			} else {
				$explodedHeight = explode('\'', $height);
				$explodedHeight[1] = strtr($explodedHeight[1], ['"' => '']);
			}

			$explodedHeight[0] = $explodedHeight[0]*12;

			foreach($explodedHeight AS $key => $value) {
				$cm += $value;
			}

			return ($cm*2.54) . 'cm';
		}
	}
}

$height = new Convert();
print $height->toFeetInch(171) . "\r\n";
print $height->toCm(5.7) . "\r\n";

// You can also pass in string variations
/*
print $height->toCm('5\'7"');
*/