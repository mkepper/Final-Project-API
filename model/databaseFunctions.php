<?php

include "database.php";
global $db;

//Adds the user to the user table
function addUser($email, $apiKey){
    global $db;
    $sql = "INSERT INTO `users`(`email`, `apiKey`) VALUES ('$email','$apiKey')";
    $db->query($sql);
}

//Gets an APIKey from the user table based off of ID
function getUser($email){
    global $db;
    $sql = "SELECT apiKey FROM users WHERE email = '$email'";
    $qry = $db->query($sql);
    $result = $qry->fetchAll();
    return $result;
}

//Gets the entry in the apidata table based off the input from the user, used for editing 
function getAPIEntry($id){
    global $db;
    $sql = "SELECT * FROM apidata WHERE zoneID = '$id'";
    $qry = $db->query($sql);
    $result = $qry->fetchAll();
    return $result;
}

//Updates the entry in the apidata table with the information provided from the user
function updateAPIEntry($id, $name, $description, $GMTTime){
    global $db;
    $sql = "UPDATE apidata SET `name`='$name',`description`='$description',`GMTTime`='$GMTTime' WHERE zoneID = $id";
    $db->query($sql);
}

?>