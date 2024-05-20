<?php

namespace Mod\User\Controller;

Class Mailconfirm extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $h["view"]["lists"][] = MYPOS."/mod/user/view/index.php";
        $h = $this->show($h);
        return $h;
    }

}
