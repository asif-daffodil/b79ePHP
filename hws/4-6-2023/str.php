<?php

$str = "dhaka is the capital of banglaesh";

echo strlen($str)."<br>";
echo str_word_count($str)."<br>";
echo strrev($str)."<br>";
echo ucfirst($str)."<br>";
echo strtoupper($str)."<br>";
echo strtolower($str)."<br>";
echo strpos($str,"the")."<br>";
echo substr($str,-10)."<br>";


/* str_replace() */
echo str_replace("dhaka","new delhi" ,$str)."<br>";
echo str_replace("banglaesh","india" ,$str)."<br>";


?>