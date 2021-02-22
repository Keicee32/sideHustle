<?php

function calc($a, $b){
    $sum = $a + $b;
    $subtraction = $a - $b;
    $div = $a / $b;
    $multiply = $a * $b;
    echo $sum . "<br>" . $subtraction . "<br>" . $div . "<br>" . $multiply . "<br> =======" . "<br>";
}

calc(2,4);
calc(4,2);
calc(8,2);