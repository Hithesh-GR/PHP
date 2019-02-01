<?php
/**********************************************************************************
 *  @Purpose        : To print the Stock Report.
 *  @file           : stockReport.php
 *  @overview       : N number of Stocks, for Each Stock Read In the Share Name,
                    Number of Share, and Share Price and calculate for each stock
                    and total stock value.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ***********************************************************************************/
require "utility.php";
/**
 * function getStockData
 */
function getStockData($n)
{
    $stock['stock'] = array();
    for ($i = 0; $i < $n; $i++) {
        $tempArr = array('ShareName' => "", 'shareNumber' => 0, 'sharePrice' => 0);
        echo "enter Share Name \n";
        $name = trim(fgets(STDIN));
        $tempArr['ShareName'] = $name;
        echo "enter Number of Share \n";
        $tempArr['shareNumber'] = Utility::readInt();
        echo "enter Share Price\n";
        $tempArr['sharePrice'] = Utility::readInt();
        array_push($stock['stock'], $tempArr);
    }
    return $stock;
}
/**
 * function to update data into the file 
 */
function update()
{
    echo "<<Number of share u want to add:>>\n";
    $update = getStockData(Utility::readInt());
    $toUpdate = json_decode(Utility::readFl("/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/stockReport.json"), true);
    foreach ($update['stock'] as $key) {
        array_push($toUpdate['stock'], $key);
    }
    return $toUpdate;
}
/**
 * function to write data into the file
 */
function write($arr)
{
    Utility::writeFl(json_encode($arr), "stockReport.json");
}
/**
 * function to display the stocks added in file
 */
function showRp()
{
    $data = json_decode(file_get_contents("/home/admin1/HitheshGR-php/OopsPrograms/JSONfiles/stockReport.json"), true);
    echo "stockName:  stockPrice:  totalStock: totalPrice:\n";
    foreach ($data['stock'] as $key) {
        echo sprintf("%-12s%-13u%-12u%-12u", $key['ShareName'], $key['shareNumber'], $key['sharePrice'], $key['shareNumber'] * $key['sharePrice']) . "\n";
    }
}
$n = 1;
while ($n == 1) {
    echo "Press:\n1 To Creat new file:\n2 Update more share:\n3 Print report:\n";
    $num = Utility::readInt();
    if ($num == 1) {
        echo "<<Enter Number of Share>>\n";
        write(getStockData(Utility::readInt()));
    } elseif ($num == 2) {
        write(update());
    } elseif ($num == 3) {
        showRp();
    }
    echo "Press 1 to continue: \nPress any key to exit:\n";
    $n = Utility::readInt();
}
