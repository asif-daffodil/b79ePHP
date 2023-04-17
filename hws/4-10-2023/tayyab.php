<?php

function fat($b, $n, $l){
    if( $b <= $l){
        echo $n ." x ". $b . " = " . $b*$n . "<br/>";
        $b++;
        fat ($b, $n, $l);
    }
}

   fat(1, rand(2, 19), 10);
?>