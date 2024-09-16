<?php

namespace Mod\Artic\Controller;

Class Index extends \Mod\Abs\Controller{


    public function index($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $art = new \Mod\Artic\Modul\Main;
        $h = $art->main($h);
        $h["view"]["lists"][] = MYPOS."/mod/artic/view/index.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }


    public function page($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $art = new \Mod\Artic\Modul\Main;
        $h = $art->art($h);

        $h["view"]["lists"][] = MYPOS."/mod/artic/view/page.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }


    

}
