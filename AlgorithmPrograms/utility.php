<?php
/******************************************************************************
 *  Execution       :   1. default node         cmd> php fileName.php                 
 *  Purpose         : TO deploy all the business logic.
 *  @file           : utility.php
 *  @overview       : ALl the business logic bus be here.
 *  @server         : Apache2 HTTP server
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ******************************************************************************/
class Utility
{
    /**
    * @purpose : function to read string and return string value
    */
    public static function readString() {
        $var = readline("");
        /**
        * if input is numeric then throw error message
        **/
        while (is_numeric($var)) { 
            echo "enter valid input : ";
            fscanf(STDIN, "%s", $var);
        }
        return $var;
    }
    /**
    * @purpose : function to read integer and return integer value
    */
    public static function readInt(){
        fscanf(STDIN, "%s", $i);
        /**
        * if input is numeric or decimal  
        **/
        while (!is_numeric($i) || $i > (int) $i) { 
            echo "enter valid input : ";
            fscanf(STDIN, "%s", $i);
        }
        return $i;
    }
    /**
    * @purpose : check the two strings are same or not
    * @parameter: *string1-first string of user input 
                  *string2-second string of user input 
    * @description : take two string from user and compare those, and prints the message wheather they are anagram or not.
    */
    public static function checkAnagram($str1, $str2)
    {
        if (count($str1) == count($str2)) { //check length of two string are equal
            $str1Arr = str_split($str1); // split to array
            $str2Arr = str_split($str2); //split to array
            asort($str1Arr); //sort array by values
            asort($str2Arr); //sort array by values
            $str3 = implode("", $str1Arr); //array to string by ""
            $str4 = implode("", $str2Arr); //array to string by ""
            if ($str3 == $str4) { //check both string are equal
                echo "-->Anagram \n";
            } 
            else {
                echo "-->Not Anagram\n";
            }
        }
    }
    /**
    * @purpose : To dispence total minimum number of notes from vending machine 
    * @parameter : input notes array and amount
    * @description : take a number from user and calculate minimum number of notes has to return vending machine use recursion method,and return the value  
    */
    public static function vendingMachine($notes, $amount){
        $tempamount = $amount;
        $totalNotes = 0;
        $flag = false;
        for ($i = 0; $i < sizeof($notes); $i++) {
            /**
            * checking each array is greater than 0 
            **/
            if (floor($tempamount / $notes[$i]) > 0) {
                /**
                * dividing given amount with array of notes 
                **/
                $Nonotes = floor($tempamount / $notes[$i]);
                $tempamount = floor($tempamount % $notes[$i]);
                /**
                * printing notes until less than 0 
                **/
                echo $Nonotes ." ". $notes[$i]."rs\n";
                $totalNotes++;
                $flag = true;
                break;
            }
        }
        /**
        * recursively checking 
        **/
        if ($flag) { 
            Utility::vendingMachine($notes, $tempamount);
        }
        return $totalNotes;
    }
    /**
    * @purpose : to find square root for non negative number by using the newton method 
    * @parameter : $c-user input value
    * @description :take value from the user and calculate the square of that number and prints the result.
    */
    public static function squareRoot($c){
        if($c>0){
            $t = $c;
            /**
            * calculate by applying formula 
            **/
            $epsilon = 1e-15 ;
            while(abs($t-($c/$t))>$epsilon*$t){
                $t = ($c/$t + $t)/2 ;
            }
            echo "Squre root of non negative number is :$t\n";
        }
        else{
            echo "Number should be positive\n";
        }
    }    
    /**
    * @purpose : to find the monthly-payment and prints the results 
    * @parameter : * principle-principle value from commandline
                   * year-year value from command line
                   * rate- rate value from command line
    * @description : take command line input of principle and year and rate and find the monthly payment 
    */
    public static function monthlyPayment($p,$y,$R){
        /**
        * calculate by applying formula 
        **/
        $r = $R/(12*100);
        $n = 12*$y;
        $payment = ($p*$r)/(1-pow(1+$r,-$n));
        echo "monthly payment :". $payment."\n";
    }
    /*
    *@purpose : generate the bubble sort array  for given array
    *@parameter : $arr-array
    *@description: take array,arrange elements according size using bubble sort,and return the result
    */
    public static function bubbleSortFile($arr)
    {
        /**
         * comparing with adjacent elements  
         **/
        for ($i = 0; $i < sizeof($arr); $i++) {
            for ($j = $i + 1; $j < sizeof($arr); $j++) {
                /**
                 * if it is greater than other then swap 
                 **/
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        echo "after sorting :\n";
        for ($k = 0; $k < sizeof($arr); $k++) {
            echo $arr[$k] . " ";
        }
        echo "\n";
    }
}
?>