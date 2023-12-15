<?php 

echo "Please enter your email<br><br>";

?>

<form action="." method="POST">
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br><br>
    <input type="Submit" value="Submit">
    <input type="hidden" name="action" value="checkEdit">
</form>
