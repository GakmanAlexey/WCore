<?php

namespace Mod\User\Controller\Admin;

Class Useradd extends \Mod\Abs\Controller{
    public function index($h){
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.user");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Group;
        $h = $gp->show_list_all($h);
        $usr = new \Mod\User\Modul\User;
        $h = $usr->start($h);
        $h = $usr ->add_from_admin($h);

        $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/useradd.php";
        $h = $this->show($h);

        return $h;
    }

}
