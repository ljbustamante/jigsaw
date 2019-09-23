<?php

function game01 ($M = [], $N = null){
    reset($M);
    $sum = 0;

    foreach($M as $i1 => $v1){
        $M1 = array_slice($M, 0, $i1);
        if(!in_array($v1, $M1)){
            $M2 = array_slice($M, ($i1 + 1));
            foreach($M2 as $i2 => $v2){
                $subset = [$v1, $v2];
                if(array_sum($subset) == $N) return $subset;
            }
        }
    }

    return false;
}

$M = [-27, 43, 2, 12, 32, -4, 9, 0, 21, 3, 7, -5, -9, 70];
print_r($M);
$N = random_int(0, 100);
var_dump($N);
var_dump(game01($M, $N));