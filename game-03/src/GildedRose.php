<?php

namespace App;

class GildedRose
{
    private static $types = ['Sulfuras' => 'Sulfuras, Hand of Ragnaros', 
                             'Brie' => 'Aged Brie', 
                             'Backpass' => 'Backstage passes to a TAFKAL80ETC concert', 
                             'Conjured' => 'Conjured Mana Cake'];

    /**
     * Of Object
     *
     * @param String $name
     * @param int $quality
     * @param int $sellIn
     * @return Object
     */
    public static function of($name, $quality, $sellIn) {
        $type = array_search($name, self::$types);
        if($type != false){
            $model = '\\App\\Models\\' . $type; 
            return new $model($name, $quality, $sellIn);
        }

        return new \App\Models\Base($name, $quality, $sellIn);
    }
}
