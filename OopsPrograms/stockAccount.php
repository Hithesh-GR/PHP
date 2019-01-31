<?php
/*****************************************************************************************************************
 *  @Purpose        : To create the JSON from Inventory Object and output the JSON String.    
 *  @file           : stockAccount.php
 *  @overview       : To Extend the inventory program to Create InventoryManager to manage the Inventory.
                      The Inventory Manager will use InventoryFactory to create Inventory Object from JSON.
                      The InventoryManager will call each Inventory Object in its list to calculate the Inventory
                      Price and then call the Inventory Object to return the JSON String.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *****************************************************************************************************************/
$data = file_get_contents('/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/stockAccount.json');//read file from json
/*
* function JSON.parse() is used to convert the string into a JavaScript Objects
*/
$arrayOfObjects = json_decode($data);
/**
 * creating a stockAccount node to create any new node with null values.
 */
class stockAccount {
    function constructor() {
        /**
         * creating an object for stockname,numberofshare & shareprice 
         */
        $this->$stockname = $stockname;
        $this->$numberofshare = $numberofshare;
        $this->$shareprice = $shareprice;
    }
    /**
     * to buy shares
     */
    function buy() {
        try {
            /**
             * add shares of stock to account 
             */
            $stock = 'enter number of stocks: ';
            if (is_numeric($stock)) throw new Exception("invalid input");
        } catch (Exception $err) {
            echo $err;
        }
        for ($i = 1; $i <= $stock; $i++) {
            try {
                $name = 'enter the name: ';
                if (!is_numeric($name)) throw new Exception("invalid input");
                $number = 'enter the number of share: ';
                if (is_numeric($number)) throw new Exception( "invalid input");
                $price = 'enter the price: ';
                if (is_numeric($price)) throw new Exception( "invalid input");
                $arrayOfObjects->push({
                    "name": $name,
                    "number_of_share": $number,
                    "price": $price
                })
                echo $arrayOfObjects;
            } catch (Exception $err) {
                echo $err;
            }
        }
    }
    /**
     * logic for selling
     */
    function sell() {
        /**
         * subtract shares of stock from account 
         */
        $i = 'which index u want to sell ? : ';
        /**
         * deleting the element 
         */
        $delete->$arrayOfObjects[$i];
        echo $arrayOfObjects;
    }
    /**
     * to save data to file
     */
    function save() {
        /**
         * save account to file 
         */
        $res = JSON.stringify($arrayOfObjects)
        fs.writeFileSync('/home/admin1/HitheshGR/OopsPrograms/JSONfiles/commercial.json'. $res. 'utf-8');
    }
    /**
     * to display the data 
     */
    function printReport() {
        /**
         * print a detailed report of stock & values 
         */
        var sum = 0;
        console.log(arrayOfObjects.length);
        for (var i = 0; i < arrayOfObjects.length; i++) {
            //console.log(i);
            var num = parseInt(arrayOfObjects[i].number_of_share * arrayOfObjects[i].price);
            console.log("the total price of each stock is: " + num);
            sum = parseInt(sum + num);
        }
        console.log("the total price of stock is: " + sum);
    }
}
$obj = new stockAccount();
while (1) {
    console.log('1.Buy the  Stocks');
    console.log('2.Sell the Stocks');/**print all the choices to user */
    console.log('3.Print the Stock Report');
    console.log('4.save the file');
    console.log('5.Exit');
    var choice = prompt('choose an option to perform desired operation :');
    switch (choice) {
        /**
         * switch case implementation to perform the required operation 
         */
        case '1': obj.buy()
            break;
        case '2': obj.sell()
            function filterByID(item) {
                console.log(item.name);
                if (item.name !== undefined) {
                    return true;
                }
                count++;
                return false;
            }
            arrayOfObjects = arrayOfObjects.filter(filterByID);
            console.log('Filtered Array\n', arrayOfObjects);
            break;
        case '3': obj.printReport();
            break;
        case '4': obj.save();
            break;
        case '5': process.exit();
        default: console.log('No Such Option ')
            break;
    }
}