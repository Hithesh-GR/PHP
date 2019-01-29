<?php
 /******************************************************************************************
 *  @Purpose        : To find square root for non negative number by using the newton method  
 *  @file           : squareRoot.php
 *  @overview       : Take value from the user and calculate the square of that number 
                      and prints the result.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *******************************************************************************************/
    require('utility.php');
    echo "enter the number : \n";
    $number = Utility::readInt();
    Utility::squareRoot($number);
?>