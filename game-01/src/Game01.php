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

    /**
     * static method sum2: use a unique bucle
     *
     * @param Array $M
     * @param int $N
     * @return Array or null
     */
    static function sum2 ($M = [], $N = null){
        reset($M);

        $i = 0;
        $j = 0;
        $Mp = [];
        do{
            s:
            $j ++;

            if($j >= sizeof($M)){
                $i ++;

                if($i >= (sizeof($M) - 1)){
                    break;
                }

                if(in_array($M[$i], $Mp)){
                    goto s;
                }

                $Mp[] = $M[$i];
                $j = $i;
                continue;
            }
            
        }while(($M[$i] + $M[$j]) != $N);

        if($i < (sizeof($M) - 1)){
            return [$M[$i], $M[$j]];
        }

        return null;
    }

    /**
     * static method sum3: use a unique bucle verify if the complement exists in others items
     *
     * @param Array $M
     * @param int $N
     * @return Array or null
     */
    static function sum3 ($M = [], $N = null){
        reset($M);

        $Mp = [];
        $Mo = $M;
        foreach($M as $i => $v){
            if(isset($Mp[$v])){
                continue;
            }
            unset($Mo[$i]);
            $vN = $N - $v;
            if(isset(array_flip($Mo)[$vN])) return [$v, $vN];
            $Mp[$v] = $i;
        }

        return null;
    }
}