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
    public static function readString()
    {
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
     * @purpose :function to read integer and return integer value
     */
    public static function readInt()
    {
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
     * @purpose : function to read float values and return double value
     */
    public static function readDouble()
    {
        fscanf(STDIN, "%s\n", $val);
        while (!is_float($val)) {
            echo "ivalid input try again\n";
            fscanf(STDIN, " %f\n ", $val);
        }
        return $val;
    }
    /**
     * @purpose : function to read flaot values and return float value
     */
    public static function readFloat()
    {
        fscanf(STDIN, "%s\n", $val);
        while (!is_float($val)) {
            echo "ivalid input try again\n";
            fscanf(STDIN, " %f\n ", $val);
        }
        return $val;
    }
    /**
     * ensure year is of four digit
     */
    public static function isLeapYear($year)
    {
        if ($year % 4 == 0 && $year % 100 == 0 || $year % 400 == 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * condition for calculate the day, month and year
     */
    public static function day($day, $month, $year)
    {
        $y0 = floor($year - (14 - $month) / 12) + 1;
        $x = floor($y0 + $y0 / 4 - $y0 / 100 + $y0 / 400);
        $m0 = ($month + 12 * floor(((14 - $month) / 12)) - 2);
        $d0 = floor(($day + $x + floor((31 * $m0) / 12)) % 7);
        return $d0;
    }
    /**
     * function to print prime number of size n
     **/
    public static function primeNumberArr($n)
    {
        $prime = 2;
        $primeArr = array();
        $count = 0;
        while ($prime < $n) {
            $flag = true;
            for ($i = 2; $i <= $prime / 2; $i++) {
                if ($prime % $i == 0) {
                    $flag = false;
                    break;
                }
            }
            if ($flag == true) {
                $primeArr[$count] = $prime;
                $count++;
            }
            $prime++;
        }
        return $primeArr;
    }
    /**
     * function to print prime anagram of prime array
     **/
    public static function printPrimeAnagram($prime)
    {
        $primeAnagram = array(); // intit array
        $count = 0;
        for ($i = 0; $i < sizeof($prime); $i++) {
            for ($j = $i + 1; $j < sizeof($prime); $j++) {
                if (Utility::isPrimeAnagram("$prime[$i]", "$prime[$j]") == true) { //check two index are anagram
                    $primeAnagram[$count] = $prime[$i]; // if true then add to array
                    $count++;
                    $primeAnagram[$count++] = $prime[$j];
                }
            }
        }
        /**
         * removes duplicate values
         **/
        $temp = array_unique($primeAnagram);
        /**
         * moving value to new array
         **/
        $new_array = array_values($temp);
        return $new_array;
    }
    /**
     * function to check two string are prime anagram in array
     **/
    public static function isPrimeAnagram($str1, $str2)
    {
        /**
         * split the string
         **/
        $tempStr1 = str_split($str1);
        $tempStr2 = str_split($str2);
        /**
         * sort the string
         **/
        asort($tempStr1);
        asort($tempStr2);
        /**
         * check size of two array are equal
         **/
        if (sizeof($tempStr1) == sizeof($tempStr2)) {
            /**
             * converting to string
             **/
            $anaStr1 = implode("", $tempStr1);
            $anaStr2 = implode("", $tempStr2);
            // echo $anaStr1;
            // echo $anaStr2;
            /**
             * if both are equal then anagram
             **/
            if ($anaStr1 == $anaStr2) {
                return true;
            }
        } else {
            return false;
        }
    }
}
