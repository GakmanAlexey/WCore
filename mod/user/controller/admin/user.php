<?php

namespace Mod\User\Controller\Admin;

Class User extends \Mod\Abs\Controller{
    public function index($h){

        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.user");

        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\User;
        $h = $gp->show_list($h);

        $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/user.php";
        $h = $this->show($h);

        return $h;
    }

}
