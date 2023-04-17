<?php

// indexed array

$arr = ["Dhaka", "Dhanmondi", "Dipti", "Dhanmondi Lake"];
echo "<pre>";
print_r($arr);
echo "</pre>";

echo $arr[1] . "<br>";

for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . " ";
}

echo "<br>";

foreach ($arr as $ar) {
    echo $ar . " ";
}

//associative array

$person = ["name" => "Asif Abir", "city" => "Dhaka", "phone" => "01955517560"];
echo "<pre>";
print_r($person);
echo "</pre>";
echo $person["name"] . "<br>";

foreach ($person as $k => $p) {
    echo ucfirst($k) . ": " . $p . "<br>";
}

// multidimantional array

$students = [
    ["Nahida", "Bogura", 22, "g" => "female"],
    ["Eva", "Bogura", 22, "g" => "female"],
    ["Asif", "Dhaka", 36, "g" => "male"],
    ["Sifat", "Dhaka", 23, "g" => "male"],
    ["Saif", "Dhaka", 23, "g" => "male"],
];

foreach ($students as $student) {
    $i = 0;
    $h = $student["g"] == "female" ? "her" : "his";
    $text = [" lives in ", " and $h age is ", "."];
    foreach ($student as $s) {
        if ($s !== "female" && $s !== "male") {
            echo $s . $text[$i];
            $i++;
        }
    }
    echo "<br>";
}
