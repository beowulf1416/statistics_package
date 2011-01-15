<?php

/**
 * Statistics engine class
 * @author ftomale
 */
class StatisticsEngine {
	
	/**
	 * Computes the mean
	 * @param array of numbers $values
	 * @throws Exception
	 */
	public static function compute_mean($values = array()){
		if(($num = count($values))>0){
			return array_sum($values)/$num;
		} else {
			throw new Exception("The array is empty");
		}
	}
	
	/**
	 * Computes the standard deviation
	 * @param array or numbers $values
	 * @throws Exception
	 */
	public static function compute_standard_deviation($values = array()){
		if(($num = count($values))>0){
			
			$mean = self::compute_mean($values);
			$sum_diff = 0;
			foreach($values as $v){
				$sum_diff += pow($v - $mean,2);
			}
			
			return sqrt($sum_diff/$num);
			
		} else {
			throw new Exception("The array is empty");
		}
	}
	
	/**
	 * Computes the median
	 * @param array of numbers $values
	 * @throws Exception
	 */
	public static function compute_median($values = array()){
		if(($num = count($values))>0){
			
			$values = sort($values);
			if(($num % 2) == 0){
				return $values[floor($num/2)];
			} else {
				$i = floor($num/2);
				return ($values[$i] + $values[$i+1])/2;
			}
			
		} else {
			throw new Exception("The array is empty");
		}
	}
	
}