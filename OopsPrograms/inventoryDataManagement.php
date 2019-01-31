<?php
/******************************************************************************************
 *  @Purpose        : To create the JSON from Inventory Object and output the JSON String.
 *  @file           : inventoryDataManagement.php
 *  @overview       : Create a JSON file having Inventory Details for Rice, Pulses and Wheats
                    with properties name, weight, price per kg.Then read Json file and
                    calculate value of each inventory.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *******************************************************************************************/
include 'utility.php';
$data = file_get_contents('/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/inventory.json'); //read file from json
/*
 * function JSON.parse() is used to convert the string into a JavaScript Objects
 */
$jsonGrocery = json_decode($data);
//echo $jsonGrocery;
function inventory()
{
    $jsonGrocery = $GLOBALS['jsonGrocery'];
    echo "\nInventory Details-->\n";
    echo "1: Rice\n";
    echo "2: Wheat\n";
    echo "3: Pulses\n";
    /*
     * enter choices to select inventory
     */
    echo "Please enter your choice: ";
    $item = Utility::readInt();
    /*
     * parse option to integer only
     */
    switch ($item) {
        case 1:
            $weight = "\nPlease enter the weight of rice you want to purchase: \n";
            if (!is_numeric($weight)) {
                for ($i = 0; $i < count($jsonGrocery->Rice); $i++) {
                    /*
                     * calculate total and prints
                     */
                    echo "\nPer Kg. of " . $jsonGrocery->Rice[$i]->name . " costs " . $jsonGrocery->Rice[$i]->price . " and for " . $jsonGrocery->Rice[$i]->weight . " Kgs. costs :" . $jsonGrocery->Rice[$i]->weight * $jsonGrocery->Rice[$i]->price . "\n";
                }
            }
            break;
        case 2:
            $weight = "\nPlease enter the weight of wheat you want to purchase: \n";
            if (!is_numeric($weight)) {
                for ($i = 0; $i < count($jsonGrocery->Wheats); $i++) {
                    /*
                     * calculate total and print
                     */
                    echo "\nPer Kg. of " . $jsonGrocery->Wheats[$i]->name . " costs " . $jsonGrocery->Wheats[$i]->price . " and for " . $jsonGrocery->Rice[$i]->weight . " Kgs. costs: " . $jsonGrocery->Rice[$i]->weight * $jsonGrocery->Wheats[$i]->price . "\n";
                }
            }
            break;
        case 3:
            $weight = "\nPlease enter the weight of pulses you want to purchase: \n";
            if (!is_numeric($weight)) {
                for ($i = 0; $i < count($jsonGrocery->Pulses); $i++) {
                    /*
                     * calculate total and print
                     */
                    echo "\nPer Kg. of " . $jsonGrocery->Pulses[$i]->name . " costs " . $jsonGrocery->Pulses[$i]->price . " and for " . $jsonGrocery->Rice[$i]->weight . " Kgs. costs: " . $jsonGrocery->Rice[$i]->weight * $jsonGrocery->Pulses[$i]->price . "\n";
                }
            }
            break;
        /**
             * validating a number item
             */
        default:
            echo "Please select a valid item!!";
    }
}
inventory();
