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
        while (is_numeric($var)) { 
            /**
             * if input is numeric then throw error message
            */
            echo "enter valid input: ";
            fscanf(STDIN, "%s", $var);
        }
        return $var;
    }
    /**
    * @purpose : check the two strings are same or not
    * @parameter: string1-first string of user input 
                   string2-second string of user input 
    * @description : take two string from user and compare those, and prints the 
                      message wheather they are anagram or not.
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
}
?>