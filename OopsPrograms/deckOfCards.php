<?php
/******************************************************************************************************
 *  @Purpose        : To print the cards received by 4 players using 2D array.
 *  @file           : deckOfCards.php
 *  @overview       : To initialize deck of cards having suit and Rank then shuffle the cards using
                    Random method and then distribute 9 Cards to 4 Players and Print the Cards the
                    received by the 4 Players.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 ******************************************************************************************************/
interface deck
{
    public function deckOfCards();
}
class cards implements deck
{
    public function deckOfCards()
    {
        /**
         * accessing the queue  from there respective path
         */
        /**
         * declaring varaibles and accessing queue
         */
        $suit = array("♣️", "🔸", "❤️", "♠️");
        $rank = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace");
        /**
         * declaring array and calculating the number of cards and pushing into array
         */
        $deck = [];
        $n = count($suit) * count($rank);
        $k = 0;
        /**
         * declaring array and calculating the number of cards and pushing into array
         */
        for ($i = 0; $i < count($suit); $i++) {
            for ($j = 0; $j < count($rank); $j++) {
                $deck[$k] = $rank[$j] . "" . $suit[$i] . " ";
                $k++;
            }
        }
        /**
         * generating random method for shuffling cards containig in array
         */
        for ($i = 0; $i < $n; $i++) {
            $random = rand(0, 51);
            $temp = $deck[$i];
            $deck[$i] = $deck[$random];
            $deck[$random] = $temp;
        }
        /**
         * adding the set of cards though for loop by range
         */
        $x = 0;
        $y = 9;
        $arr = array();
        for ($i = 0; $i < 4; $i++) {
            $iArr = array();
            for ($j = 0; $j < 9; $j++) {
                $iArr[$j] = $deck[$j + $x];
            }
            array_push($arr, $iArr);
            $x = $x + 9;
        }
        /**
         * printing the result containing in array
         */
        for ($index = 0; $index < count($arr); $index++) {
            $person = $index + 1;
            echo "[ person " . $person . "]-[";
            for ($index1 = 0; $index1 < 9; $index1++) {
                echo $arr[$index][$index1];
            }
            echo "]\n";
        }
    }
}
$obj = new cards;
$obj->deckOfCards();
