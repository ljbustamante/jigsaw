<?php
namespace App\Models;

final class Backpass extends Base{

    protected $varQuality = 0;

    public function process(){
        $this->quality ++;

        if($this->sellIn < 10) $this->quality ++;
        if($this->sellIn < 5) $this->quality ++;
        if($this->sellIn < 0) $this->quality = 0;
    }

}