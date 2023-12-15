<?php

//Logic to check the selected time zone against central. Ideally this would pull from the system clock and check against the users location
//But, that I don't have the time for :)
$centralTime = -6;
$timeZone = filter_input(INPUT_POST, 'timeZone');
$combinedTime = $centralTime + ($timeZone * -1);
$x;

//Determines if the display should output that the location is behind, ahead, or the same as central
if($timeZone > -6 && $timeZone < 0){
    $x = $combinedTime * -1 . " hours behind ";
}
elseif($timeZone == -6){
    $x = "the same as ";
}
else{
    $x = $combinedTime * -1 . " ahead of ";
}

echo "<h1>Your selected timezone is " . $x . " central time</h1>"

?>