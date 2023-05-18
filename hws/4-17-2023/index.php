<?php

$year = 1900;

if ($year % 4 == 0 && $year % 100 != 0) {
    echo "The year $year is leap year";
} else if ($year % 400 == 0) {
    echo "The year $year is leap year";
} else {
    echo "The year $year is not leap year";
}
