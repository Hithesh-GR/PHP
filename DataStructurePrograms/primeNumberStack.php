<?php
/*********************************************************************************************
 *  @Purpose        :Add the Prime Numbers that are Anagram in the Range of 0-1000 in a
                    Stack using the Linked List and Print the Anagrams in the Reverse Order.
 *  @file           : primeNumberStack.php
 *  @overview       :Here we have to display the Prime number with Anagram Numbers in reverse
                    order using stack in a linked list.
 *  @author         : HITHESH G R
 *  @version        : PHP v7.0.32
 *  @since          : 28-01-2019
 *********************************************************************************************/
require 'utility.php';
require 'stack.php';
echo "enter the range value: \n";
/**
 * read number
 **/
$num = Utility::readInt();
/**
 * function to get prime number in arrays
 **/
$primeArr = Utility::primeNumberArr($num);
/** function to get primes that are anagram */
$primeAna = Utility::printPrimeAnagram($primeArr);
/**
 * create new stack
 **/
$stack = new Stack();
$stack1 = new Stack();
/**
 * push prime anagram array in stack
 **/
for ($i = 0; $i < count($primeAna); $i++) {
    $stack->push($primeAna[$i]);
}
/**
 * push element into stack that is popped
 **/
for ($i = 0; $i < sizeof($primeAna); $i++) {
    $stack1->push($stack->pop());
}
echo "Prime and Anangram Numbers are:\n";
$stack1->display();
