<?php
 /***********************************************************************************
 *  @Purpose        : To find the monthly-payment and prints the results  
 *  @file           : monthlyPayment.php
 *  @overview       : take command line input of principle and year and rate and find 
                      the monthly payment.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ***********************************************************************************/
    require('utility.php');
    echo "enter the principal amount : \n";
    $p = Utility::readInt();
    echo "enter the number of  year :\n";
    $y = Utility::readInt();
    echo "enter the rate of interest :\n";
    $R = Utility::readInt();
    Utility::monthlyPayment($p,$y,$R);
?>