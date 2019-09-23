<?php

namespace App;

abstract class Game01{

    /**
     * static method sum
     *
     * @param Array $M
     * @param int $N
     * @return Array or null
     */

    static function sum ($M = [], $N = null){
        reset($M);

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

        return null;
    }
}