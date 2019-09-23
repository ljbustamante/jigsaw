<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    /*
    public function tick()
    {
        if ($this->name != 'Aged Brie' and $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($this->quality > 0) {
                if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                    $this->quality = $this->quality - 1;
                }
            }
        } else {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;

                if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->sellIn < 11) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                    if ($this->sellIn < 6) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                }
            }
        }

        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->sellIn = $this->sellIn - 1;
        }

        if ($this->sellIn < 0) {
            if ($this->name != 'Aged Brie') {
                if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->quality > 0) {
                        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                            $this->quality = $this->quality - 1;
                        }
                    }
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }
    }
    */

    
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const BRIE = 'Aged Brie';
    const BACKPASS = 'Backstage passes to a TAFKAL80ETC concert';
    const CONJURED = 'Conjured Mana Cake';

    public function tick(){
        if($this->name == self::SULFURAS) return;

        $this->sellIn --;

        $varQuality = 0;
        if(!in_array($this->name, [self::BRIE, self::BACKPASS, self::CONJURED])){
            $varQuality = -1;
            $this->quality += $varQuality;
        }

        if($this->name == self::BRIE){
            $varQuality = 1;
            $this->quality += $varQuality;
        }

        if($this->name == self::BACKPASS){
            $this->quality ++;
            if($this->sellIn < 10) $this->quality ++;
            if($this->sellIn < 5) $this->quality ++;
            if($this->sellIn < 0) $this->quality = 0;
        }

        if($this->name == self::CONJURED){
            $varQuality = -2;
            $this->quality += $varQuality;
        }

        if($this->sellIn < 0) $this->quality += $varQuality;

        if($this->quality < 0) $this->quality = 0;
        if($this->quality > 50) $this->quality = 50;
    }
}
