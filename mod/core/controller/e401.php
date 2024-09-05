<?php

namespace Mod\Core\Controller;

Class E401 extends \Mod\Abs\Controller{
    public function index($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $h["view"]["lists"][] = MYPOS."/mod/pages/view/e401.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);
        return $h;
    }

}
