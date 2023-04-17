<?php  
    $i = 0;

    while ($i < 10) {
        if($i == 6){
            break;
        }
        echo $i++." ";
    }

    echo "<br>";

    for ($x = 0; $x < 10; $x++) {
        if ($x > 3 && $x < 6) {
          continue;
        }
        echo "The number is: $x <br>";
      }

    echo "<br>";

    for ($i=0; $i < 10; $i++) { 
        echo $i." ";
    }

    $i = 15;

    echo "<br>";
    
    do {
        echo $i++." ";
    }while ($i < 10);

    echo "<br>";

    $person = ["Sifat", "24", "Dhaka", "Male", "Student"];

    foreach($person as $p){
        echo $p." ";
    }
?>