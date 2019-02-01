<?php
require("utility.php");
function validInt($int, $min, $max)
{
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("Invalid input\n");
        echo "Enter again : ";
        $int = Utility::readInt();
    }
    return $int;
}
function addAddress($fName, $lName, $address, $city, $state, $zip, $pNumber)
{
    $addressBook = json_decode(file_get_contents("/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/addressBook.json"), true);
    $adDetail = array("FirstName" => $fName, "LastName" => $lName, "Address" => $address, "City" => $city, "State" => $state, "Zip" => $zip, "PhoneNumber" => $pNumber);
    array_push($addressBook, $adDetail);
    Utility::writeFl(json_encode($addressBook), "addressBook.json");
    echo "Address data Save:\n";
}
function editAddress($fName, $lName)
{
    $addressBook = json_decode(file_get_contents("/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/addressBook.json"), true);
    for ($i = 0; $i < sizeof($addressBook); $i++) {
        if ($addressBook[$i]['firstname'] == $fName && $addressBook[$i]['lastName'] == $lName) {
            echo "Address deatils...\nAddress\n";
            $addressBook[$i]['address'] = trim(fgets(STDIN));
            echo "City\n";
            $addressBook[$i]['city'] = trim(fgets(STDIN));
            echo "State\n";
            $addressBook[$i]['state'] = trim(fgets(STDIN));
            echo "Enter Zip\n";
            $addressBook[$i]['zip'] = validInt(Utility::readInt(), 100000, 999999);
            echo "Mobile Number\n";
            $addressBook[$i]['pNumber'] = validInt(Utility::readInt(), 1000000000, 9999999999);
            echo "Data save\n";
            Utility::writeFl(json_encode($addressBook), "addressBook.json");
            return;
        }
    }
    echo "No address found by Name :" . $fName . " " . $lName;
}
function remove($fName, $lName)
{
    $addressBook = json_decode(file_get_contents("/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/addressBook.json"), true);
    $i = 0;
    foreach ($addressBook as $key) {
        if ($key['firstname'] == $fName && $key['lastName'] == $lName) {
            unset($addressBook[$i]);
            Utility::writeFl(json_encode($addressBook), "addressBook.json");
            echo "Address deleted:\n";
            return;
    }
        $i++;
    }
    echo "No data found to delete\n";
}
function sortAd($n)
{
    $addressBook = json_decode(file_get_contents("/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/addressBook.json"), true);
    if ($n == 2) {
        for ($i = 1; $i < sizeof($addressBook); $i++) {
            //save the value of array index into temp
            $temp = $addressBook[$i];
            //$k to hold previous value 
            $k = $i - 1;
            //while loop until temp value is less then index value of array  or 0 index 
            while ($k >= 0 && $addressBook[$k]['zip'] > $temp['zip']) {
                //swap the index 
                $addressBook[$k + 1] = $addressBook[$k];
                $k--;
            }
            //after while loop get position of temp varible 
            $addressBook[$k + 1] = $temp;
            
       }   
       show($addressBook);
    } 
    elseif ($n == 1) {
        for ($i = 1; $i < sizeof($addressBook); $i++) {
            //save the value of array index into temp
            $temp = $addressBook[$i];
            //$k to hold previous value 
            $k = $i - 1;
            //while loop until temp value is less then index value of array  or 0 index 
            while ($k >= 0 && $addressBook[$k]['firstname'] > $temp['firstname']  ) {
                //swap the index 
                $addressBook[$k + 1] = $addressBook[$k];
                $k--;
            }
            //after while loop get position of temp varible 
            $addressBook[$k + 1] = $temp;    
        }
        show($addressBook);
    }
    else {
        echo "Invalid Input\n";
        main();
    }
}
function show($arr)
{
    foreach ($arr as $key) {
        echo "Name: ".$key['firstname']." ".$key['lastName']."\n";
        echo "Address: ".$key['address']."\n".$key['city']." ".$key['state']."\n";
        echo "Zip: ".$key['zip']."\n";
        echo "PhoneNumber: ".$key['pNumber']."\n";
        echo "-------------------------------\n";
    }
}
function main()
{
    $n = 0;
    while ($n != 5) {
        echo "Press:\n1. Add new address:\n2. Edit address:\n3. Remove address:\n4. Show address book:\n5. Exit:\n";
        $n = Utility::readInt();
        switch ($n) {
            case 1:
                echo "Enter first name:\n";
                $fName = trim(fgets(STDIN));
                echo "Enter last name:\n";
                $lName = trim(fgets(STDIN));
                echo "Enter address:\n";
                $address = trim(fgets(STDIN));
                echo "Enter city:\n";
                $city = trim(fgets(STDIN));
                echo "Enter state:\n";
                $state = trim(fgets(STDIN));
                echo "Enter zip code:\n";
                $zip = validInt(Utility::readInt(), 100000, 999999);
                echo "Enter mobile number:\n";
                $pNumber = validInt(Utility::readInt(), 1000000000, 9999999999);
                addAddress($fName, $lName, $address, $city, $state, $zip, $pNumber);
                break;
            case 2:
                echo "Enter first name:\n";
                $fName = trim(fgets(STDIN));
                echo "Enter last name:\n";
                $lName = trim(fgets(STDIN));
                editAddress($fName, $lName);
                break;
            case 3:
                echo "Enter first name:\n";
                $fName = trim(fgets(STDIN));
                echo "Enter last name:\n";
                $lName = trim(fgets(STDIN));
                remove($fName, $lName);
                break;
            case 4:
                echo "Press:\n1. Sort by name:\n2. Sort by Zip\n";
                $s = Utility::readInt();
                sortAd($s);
                break;
            default:
                if($n != 5){
                    echo "Invalid Input\n";
                }
                break;
        }
    }
}
main();
?>