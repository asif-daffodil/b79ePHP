<?php
$cap = "Dhaka is the capital of Bangladesh";
echo $cap;
echo "<br/>";

$capital = str_replace("Dhaka","Delhi",$cap);
$capital = str_replace("Bangladesh","India",$capital);
echo $capital;
?>