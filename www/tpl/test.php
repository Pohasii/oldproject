<?php 

$input = "-----Alien";
echo str_pad($input, 10);                      // выводит "Alien     "
echo str_pad($input, 8, "    ", STR_PAD_LEFT);  // выводит "-=-=-Alien"
echo str_pad($input, 10, "_", STR_PAD_BOTH);   // выводит "__Alien___"
echo str_pad($input, 6 , "___");               // выводит "Alien_


?>