<?php

function randomPassword() {

// define variables used within the function    
    $used_symbols = '';
    $password = '';
 
// an array of different character types    
    $used_symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!?';
    $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
    for ($i = 0; $i < 9; $i++) {
        $n = rand(0, $symbols_length); // get a random character from the string with all characters
        $password .= $used_symbols[$n]; // add the character to the password string
    } 
    return $password; // return the generated password
}
?>
