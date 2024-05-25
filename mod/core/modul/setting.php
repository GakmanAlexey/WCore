<?php

namespace Mod\Core\Modul;

Class Setting{
    public $url         = "wcore.loc";
    public $name         = "WCORE";
    public $l           = "wcore.loc";
    public $hashproduct = "wcore.loc";
    public $install = false;
    
    

    public function start($h){
        $h["error"] = []; 
        $h["cache"] = [];
        $h["cache"]["job"] = false;
        $h["install"] = [];
        $h["view"] = [];
        $h["view"]["lists"] = [];
        $h["setting"] = $this;
        $h["group"] = [];
        $h["admin"] = [];
        return $h;
    }
}
