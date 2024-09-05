<?php

namespace Mod\User\Controller;

Class Mailconfirm extends \Mod\Abs\Controller{
    public function index($h){
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $conf = new \Mod\User\Modul\Mailconfirm;
        $h = $conf->start_confirm($h);

        $h["view"]["lists"][] = MYPOS."/mod/user/view/mailconfirm.php";
        $h = $this->show($h);
        return $h;
    }

}
