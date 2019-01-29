<?php
 /***********************************************************************************
 *  @Purpose        : check the two strings are same or not   
 *  @file           : anagramString.php
 *  @overview       : take two string from user and compare those, and prints the 
                      message wheather they are anagram or not.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ***********************************************************************************/
    include('utility.php');
    ECHO "enter first string: ";
    $str1 = Utility::readString();//read string1
    print "enter second string: ";
    $str2 = Utility::readString();//read string2
    Utility::checkAnagram($str1,$str2);
?>