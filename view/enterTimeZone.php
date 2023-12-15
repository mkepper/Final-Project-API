<?php

$email = filter_input(INPUT_POST, 'email');
$key = filter_input(INPUT_POST, 'key');
//If the email and key are set then the user will be added to the database
if (isset($_POST['email'],$_POST['key'])){
    addUser($email, $key);
}
?>

<!--Form to display the information from the API call-->

<form action="." method="POST">
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="<?= $email ?>"><br><br>
    <label for="key">API Key:</label><br>
    <input type="text" id="key"name="key" value="<?= $key ?>"><br><br>
    <select name="timeZone" id="timeZone">
        <!--Javascript uses axios to call the API and deliver it in a JSON package as the response-->
        <script>
            axios.get('model/timeZoneApi.php')
            .then(function (response){
                console.log(response.data);
                //Storing the response data as zones
                const zones = response.data;
                //Choosing the select to use
                const select = document.getElementById('timeZone');
                //Looping through the instances in zone
                zones.forEach(zone => {
                    //create option elements for each instance
                    const option = document.createElement('option');
                    //Set the value and the text to what will be displayed in the dropdown
                    option.value = zone.GMTTime;
                    option.text = `${zone.name} ${zone.description}`;
                    //Adding the options into the select statement
                    select.add(option);
                });
            })
            //Error handling
            .catch(function(error){
                console.log(error);
            });
        </script>
    </select><br><br>
    <input type="Submit" value="Submit">
    <input type="hidden" name="action" value="timeZoneSet">
</form>

