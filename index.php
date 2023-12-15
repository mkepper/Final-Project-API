<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    include "view/nav.php";
    include "model/databaseFunctions.php";

    //Retrieving action if it is a Get or POST
    $action = filter_input(INPUT_GET, 'action');
    $action ? $action : $action = filter_input(INPUT_POST, 'action');

    //Switch board for deciding which view to use
    switch($action){
        case "emailSet":
            include "view/enterTimeZone.php";
            break;
        case "timeZoneSet":
            include "view/timeZoneSet.php";
            break;
        case "editData":
            include "view/editData.php";
            break;
        case "viewData":
            include "view/viewData.php";
            break;
        case "checkView":
            //Conditional to check if user exists
            $key = getUser($email = filter_input(INPUT_POST, 'email'));
            if($key){
                //If user exists then they can view API data
                include "view/displayData.php";
                break;
            }
            else{
                echo "<h2>You must make a new account through the home page first.</h2>";
                break;
            }
            break;
        case "checkEdit":
            //Conditional to check if user exists
            $key = getUser($email = filter_input(INPUT_POST, 'email'));
            if($key){
                //If user exists then they can edit
                include "view/displayEdit.php";
                break;
            }
            else{
                echo "<h2>You must make a new account through the home page first.</h2>";
                break;
            }
            break;
        case "edit":
            include "view/edit.php";
            break;
        case "updateEntry":
            //Update API entry from POSTed info
            updateAPIEntry(filter_input(INPUT_POST, 'timeZone'),
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'), 
            filter_input(INPUT_POST, 'GMTTime'));

            //Purposly left without break so that it goes to default after
        default:
            include "view/registration.php";

    }
    ?>
</body>
</html>