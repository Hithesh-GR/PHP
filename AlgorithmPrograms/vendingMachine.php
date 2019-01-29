<?php
 /***********************************************************************************
 *  @Purpose        : To dispence total minimum number of notes from vending machine   
 *  @file           : vendingMachine.php
 *  @overview       : take a number from user and calculate minimum number of notes 
                      has to return vending machine use recursion method,and return 
                      the value.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ***********************************************************************************/
    include('utility.php'); 
    $arr = array('1000','500','100','50','10','5','2','1');
    echo "enter the  value :\n";
    $amount = Utility::readInt();
    while($amount<1){
        echo "enter amount greater than zero :\n";
        $amount = Utility::readInt();
    }
   Utility::vendingMachine($arr,$amount);
?>