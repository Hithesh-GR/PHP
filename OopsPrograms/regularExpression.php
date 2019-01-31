<?php
/******************************************************************************************
 *  @Purpose        : To Print the Modified Message with proper validation.
 *  @file           : regularExpression.php
 *  @overview       : Read the given message then replace the data with proper values and
                    print modified message.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *******************************************************************************************/
function regularExpression()
{
    require 'utility.php';
    /**
     * string to hold the original string to display
     */
    $string = "Hello <<name>>, We have your full name as <<full name>> in our system.
Your contact number is 91-xxxxxxxxxx.
Please,let us know in case of any clarification.\n                   Thank you!!..
                                BridgeLabz : xx/xx/xxxx \n";
    echo "enter the first name: \n";
    $name = Utility::readString();
    echo "enter the full name: \n";
    $fullname = Utility::readString();
    echo "enter the mobile number: \n";
    /**
     * validation for mobilenumber
     **/
    while (strlen($mobileNumber = Utility::readInt()) <10) {
        echo "Enter correct Mobile number\n";
    }
    /**
     * replacing mobilenumber using regex
     **/
    $string = preg_replace("/\d{2}\-x+/", $mobileNumber, $string);
    /**
     * replacing <<name>> using regex
     */
    $string = preg_replace("/<+\w{4}>+/", $name, $string);
    /**
     * replacing <<fullname>> using regex
     **/
    $string = preg_replace("/<+\w+\s\w+>+/", " " . $fullname, $string);
    /**
     * replacing todays date with current date
     **/
    $string = preg_replace("/x*\/x*\/x*/", date("d/m/Y"), $string);
    echo "$string";
}
regularExpression();
