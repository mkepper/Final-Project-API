<?php

//Generates a unique key for each user when they enter there email
function generateKey(){
    $apiKey = bin2hex(random_bytes(16)); // Generates a 32-character hex string
    return $apiKey;
}


?>