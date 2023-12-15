<?php
$id = filter_input(INPUT_POST, 'timeZone');
$entry = getAPIEntry($id);
$entry = $entry[0];

?>

<!--Form will collect information about wich entry from the API that the user would like to change-->

<form action="." method="POST">
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name" value='<?= @$entry['name'] ?>'><br><br>
    <label for="description">Description</label><br>
    <input type="text" id="description" name="description" value='<?= @$entry['description'] ?>'><br><br>
    <label for="GMTTime">GMTTime</label><br>
    <input type="text" id="GMTTime" name="GMTTime" value='<?= @$entry['GMTTime'] ?>'><br><br>
    <input type="Submit" value="Submit">
    <!--Once the entries have been made, the call to the update function of the database is made and these values are retrieved from POST-->
    <input type="hidden" name="action" value="updateEntry">
    <input type="hidden" name="timeZone" value="<?= $id ?>">
</form>