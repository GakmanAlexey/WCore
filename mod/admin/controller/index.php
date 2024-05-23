<?php

namespace Mod\Admin\Controller;

Class Index extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $h["view"]["lists"][] = MYPOS."/mod/admin/view/index.php";
        $h = $this->show($h);

        return $h;
    }

}
