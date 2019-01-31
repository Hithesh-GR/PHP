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
}
?>