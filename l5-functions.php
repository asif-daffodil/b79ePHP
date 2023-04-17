<?php  
    $a = 22;
    function tayyab ($name="Sakib Khan", $age="40") {
        if($age < 50){
            return ("
            Person Name: $name 
            <br> 
            Person Age: $age 
            <br> 
            ");
        }
        return "<i>Sifat khub valo chele <br> Dipti te tar dekha mile!</i>";
    }

    echo (tayyab ("Md. Tayyab", $a));
    echo tayyab (age:25, name:"Md. Saif");
    echo tayyab ("Hero Alom", 60)."<br><br>";

    function sifat ($n) {
        if($n < 10){
            echo $n++;
            sifat($n);
        }
    }

    sifat(1);

?>