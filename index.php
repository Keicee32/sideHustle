<?php


// for ($i=0; $i <= 200 ; $i++) { 
//     $randNum[] = mt_rand(100000000, 999999999) . mt_rand(1000000, 9999999) . "<br>";
// }
// print_r($randNum);

for ($i=0; $i <= 200 ; $i++) { 
    $randNum[] = rand(pow(10,15), pow(10,16)-1) . "<br>"; // This generates random 16 digits random numbers
}
print_r($randNum);

// for ($i=0; $i <= 200 ; $i++){
// $randNums = rand(pow(10,16), 1) . "<br>";
// echo $randNums;
// }

?>