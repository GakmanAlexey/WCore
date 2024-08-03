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
        $h["pex"] = [];
        $h["pex"]["pre_allow"] = [];
        $h["pex"]["pre_dis"] = [];
        return $h;
    }
}
