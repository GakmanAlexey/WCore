<?php

namespace Mod\User\Controller;

Class Recover extends \Mod\Abstract\Controller{
    public function index($h){
        $user = new \Mod\User\Modul\User;
        $h = $user->start($h);
        $h = $user->recover($h);
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $h["view"]["lists"][] = MYPOS."/mod/user/view/recover.php";
        $h = $this->show($h);
        return $h;
    }

}
