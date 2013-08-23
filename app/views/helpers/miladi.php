<?php
/**
 * Hijri Date Converter Helper class file.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.helpers
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class MiladiHelper extends AppHelper {

	/**
	 * Converts a date to hijri format
	 * @param string $date yyyy-mm-dd.
	 * @param boolean $monthname, set to true to get full monthname like Muharram or false for number.
	 * @access public
	 */
	function convertMiladi($date,$monthname=false) {
		$y = substr($date,0,4);
		$m = substr($date,5,2);
		$d = substr($date,8,2);


		if(!$monthname){ // return basic
			return($d.'-'.$m.'-'.$y);
		} else { // return full
			switch ($m){
				case 1:
					$mn = 'يناير';
					break;
				case 2:
					$mn = ' فبراير';
					break;
				case 3:
					$mn = 'مارس';
					break;
				case 4:
					$mn = 'أبريل';
					break;
				case 5:
					$mn = 'مايو';
					break;
				case 6:
					$mn = 'يونيو';
					break;
				case 7:
					$mn = 'يوليه';
					break;
				case 8:
					$mn = ' أغسطس';
					break;
				case 9:
					$mn = 'سبتمبر';
					break;
				case 10:
					$mn = 'أكتوبر';
					break;
				case 11:
					$mn = 'نوفمبر';
					break;
				case 12:
					$mn = 'ديسمبر';
					break;
			}
			return($d.' '.$mn.' '.$y);
		}
	}
	
	function convertDay($day) {
		
		switch ($day){
			case 1:
				$day = " الاثنين";
				break;
			case 2:
				$day = " الثلاثاء";
				break;
			case 3:
				$day = " الاربعاء ";
				break;
			case 4:
				$day = " الخميس";
				break;
			case 5:
				$day = " الجمعة";
				break;
			case 6:
				$day = " السبت";
				break;
			case 7:
				$day = " الاحد";
				break;
		}
		return($day);
	}
}
