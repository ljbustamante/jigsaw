<?php
namespace App\Models;

class Base{
    
    public $name;

    public $quality;

    public $sellIn;

    protected $varQuality = -1;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick(){
        $this->sellIn --;
        $this->process();

        if($this->sellIn < 0) $this->quality += $this->varQuality;

        if($this->quality < 0) $this->quality = 0;
        if($this->quality > 50) $this->quality = 50;
    }

    public function process(){
        $this->quality += $this->varQuality;
    }
}