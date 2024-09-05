<?php

namespace Mod\User\Controller;

Class Logconfirm extends \Mod\Abs\Controller{
    public function index($h){
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $h["view"]["lists"][] = MYPOS."/mod/user/view/logconfirm.php";
        $h = $this->show($h);
        return $h;
    }

}
