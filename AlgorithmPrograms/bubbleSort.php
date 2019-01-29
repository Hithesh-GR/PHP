<?php
 /******************************************************************************************
 *  @Purpose        : generate the bubble sort array for given array  
 *  @file           : bubbleSort.php
 *  @overview       : take array,arrange elements according size using bubble sort,and return the result
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *******************************************************************************************/
    require 'utility.php';
    /**
     * path of file 
     **/
    $path = "sort.txt";
    /**
     * reading from file 
     **/
    $file = fopen($path, "r") or die("file not found");
    /**
     * storing in string from file 
     **/
    $fileString = fgets($file);
    /**
     * explode string by ',' to array string 
     **/
    $str = explode(",", $fileString);
    echo "before sorting :\n";
    for ($i = 0; $i < sizeof($str); $i++) {
        echo $str[$i] . " ";
    }
    echo " \n";
    /** 
     * function to sort data with bubblesort
     **/
    Utility::bubbleSortFile($str);
?>