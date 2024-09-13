<?php

namespace Mod\Lc\Controller;

Class Index extends \Mod\Abs\Controller{


    public function index($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/lc/view/lc.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }


    public function balance($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/lc/view/lcb.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }


    public function history($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/lc/view/lcz.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

    

}