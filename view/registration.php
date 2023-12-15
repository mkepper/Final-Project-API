<?php
    echo "<h1>Please enter your email, you will be given an API key to use in order to connect to the API</h1><br><br>";
    include "model/generateAPIKey.php";
?>

<!--Form will take the users email and generate an API key for the user-->

<form action="." method="POST">
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br><br>
    <input type="Submit" value="Submit">
    <input type="hidden" name="key" value="<?= generateKey() ?>">
    <input type="hidden" name="action" value="emailSet">
</form>