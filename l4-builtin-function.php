<?php  
    $str = "Dhaka is the capital of Bangladesh";

    echo strlen($str)."<br>";
    echo str_word_count($str)."<br>";
    echo strrev($str)."<br>";
    echo strtoupper($str)."<br>";
    echo strtolower($str)."<br>";
    echo ucfirst($str)."<br>";
    echo strpos($str, "capital")."<br>";
    echo str_replace("Dhaka", "Bhrammonbaria", $str)."<br>";
    echo substr($str, -10)."<br>";

    $num = 2023.3;
    echo round($num)."<br>";
    echo floor($num)."<br>";
    echo ceil($num)."<br>";

    $num = "2023";
    echo var_dump(is_int($num))."<br>";
    echo var_dump(is_nan($num))."<br>";
    echo var_dump(is_numeric($num))."<br>";
    echo var_dump(is_string($num))."<br>";

?>