<?php
/******************************************************************************************
 *  @Purpose        : Take a range of 0-1000 Numbers and find the Prime numbers in that
                    range.Store the prime numbers in a 2D Array, the first dimension
                    represents the range 0-­100,100­-200, and so on.While the second
                    dimension represents the prime numbers in that range.
 *  @file           : primeNumbers.php
 *  @overview       : Here we have to print the given range of prime numbers in 2D Array
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *******************************************************************************************/
require 'utility.php';
echo "enter the range value: \n";
$num = Utility::readInt();
/**
 * function to get prime number in array
 **/
$primeArr = Utility::primeNumberArr($num);
$twoDPrime = array();
$range = 100;
$k = 0;
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 100; $j++) {
        /**
         * travserse till reaches condition   
         **/
        if ($k == sizeof($primeArr) || $primeArr[$k] > $range) {
            break;
        }
        $twoDPrime[$i][$j] = $primeArr[$k++];
    }
    /**
     * increment by 100 for every loop 
     **/
    $range += 100;
}
print_r($twoDPrime);
/**
 * printing twoDaary 
 **/
for ($i = 0; $i < sizeof($twoDPrime); $i++) {
    for ($j = 0; $j < sizeof($twoDPrime[$i]); $j++) {
        echo $twoDPrime[$i][$j] . " ";
    }
    echo "\n";
}
