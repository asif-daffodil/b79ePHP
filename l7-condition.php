<?php  
    $religion = "Islam";
    $country = "Bangladesh";

    if($religion == "Shanatan" && $country == "Bangladesh"){
        echo "Nomoshkar";
    }elseif($religion == "Buddhist" && $country == "Bangladesh"){
        echo "Omm Shanti";
    }elseif($religion == "Christian" && $country == "Bangladesh"){
        echo "God Bless you";
    }elseif($religion == "Islam" && $country == "Bangladesh"){
        echo "Assalamuoyalaikum";
    }else{
        echo "Hi";
    }

    echo "<br>";

    //switch
    $city = "Barishal";

    switch ($city) {
        case 'Noyakhali':
            echo "Noyakhalina onek maramari lage";
            break;

        case 'Barishal':
            echo "Barishale onek dakat ase";
            break;

        case 'Bhammonbaria':
            echo "Emotional...";
            break;
        
        default:
            echo "Joy Bangla...";
            break;
    }

    echo rand(2, 9);
?>