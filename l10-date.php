<?php
date_default_timezone_set("asia/dhaka");
echo date("d/F/Y l h:i:s A");

echo "<br>";
//h m s m d y
$myBday = mktime(0, 0, 0, 9, 10, 2035);
echo date("l - Y", $myBday);
echo "<br>";

//strtotime
$nxtDay = strtotime("+3 years +4 months -2 days");
echo date("d/F/Y - l", $nxtDay);
echo "<br>";

$strDate = strtotime("next friday");
$endDate = strtotime("+6 weeks", $strDate);

while ($strDate <= $endDate) {
    echo date("d/F/Y - l", $strDate) . "<br>";
    $strDate = strtotime("+1 weeks", $strDate);
}
