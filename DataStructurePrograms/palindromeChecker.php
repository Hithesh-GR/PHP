<?php
/******************************************************************************************
 *  @Purpose        : A palindrome is a string that reads the same forward and backward,
                    forexample,radar,toot,and madam. We would like to construct an
                    algorithm to input a string of characters and check whether it is a
                    palindrome.
 *  @file           : palindromeChecker.php
 *  @overview       : we will take dequeue here to check a string of character from left to
                    right and then pop the characters from front and rear and if it matches
                    then its a pallindrome otherwise its not a pallindrome.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *******************************************************************************************/
require 'utility.php';
require 'palindromeDeque.php';
/**
 * create new deque
 **/
$deque = new Deque;
/**
 * enter the string to check whether it is a palindrome
 **/
echo "enter the string \n";
$str = Utility::readString();
trim($str);
/**
 * split the string to array
 **/
$str1 = str_split($str);
print_r($str1);
/**
 * add array to deque at the end
 **/
for ($i = 0; $i < sizeof($str1); $i++) {
    $deque->addRear($str1[$i]);
}
$deque->displayForward();
echo "\n";
$string = "";
/**
 * store it in string after removing at end
 **/
for ($i = 0; $i < sizeof($str1); $i++) {
    $string = $string . $deque->removeRear();
}
echo $string . "\n";
/**
 * if both string are equal then palidrome
 **/
if ($str == $string) {
    echo "String is Palindrome\n";
} else {
    echo "String is Not a Palindrome\n";
}
