<?php
 /***********************************************************************************
 *  @Purpose        : In this program we have to print the Calendar that takes the
                      month and year as command­line arguments and prints the Calendar
                      of the month.   
 *  @file           : calendar2D.php
 *  @overview       : Store the Calendar in an 2D Array,the first dimension the week of 
                      the month and the second dimension stores the day of the week.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ***********************************************************************************/
include('utility.php');
//require 'utility.php';
$months = [
    "",
    "January", "February", "March",
    "April", "May", "June",
    "July", "August", "September",
    "October", "November", "December"
];
/**
* days[i] = number of days in month i
*/
$days = [
    0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
 ];
 try{
    echo  "enter month :";
    $newMonth = Utility::readInt();
    echo "enter year :";
    $newYear = Utility::readInt();
    if ($newMonth < 1 || $newMonth > 12) throw new Exception( "Month value is Invalid , Please Enter a value in range 1-12");
    if ($newMonth == null || $newYear == null) throw new Exception("No input found");
    if (is_nan($newMonth) || is_nan($newYear)) throw new Exception("No input or String found , Please Enter a value in range 1-12");
    if ($newMonth % 1 != 0 || $newYear % 1 != 0) throw new Exception("Number required , Floating value found");
    /**
    * check for leap year
    */
    if ($newMonth == 2 && Utility::isLeapYear($newYear)) $days[$newMonth] = 29;
    echo "   " . $months[$newMonth] . "   " . $newYear."\n";
    echo " S  M Tu  W Th  F  S\n";
    /**
    * starting day
    */
    $day = Utility::day($newMonth, 1, $newYear);
    /**
    * print the calendar
    */
    for ($i = 0; $i < $day; $i++) {
        echo "   ";
    }
    for ($i = 1; $i <= $days[$newMonth]; $i++) {
        echo (" ". $i);
        if ($i < 10) {
            echo " ";
        }
        if ((($i + $day) % 7 == 0) || ($i == $days[$newMonth])) {
            echo " \n";
        }
    }
} catch (Exception $err) {
    echo $err;
}
?>