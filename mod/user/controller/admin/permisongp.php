<?php

namespace Mod\User\Controller\Admin;

Class Permisongp extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $gp = new \Mod\User\Modul\Admin\Pex;
        $h = $gp->show_list_group($h);

        $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongp.php";
        $h = $this->show($h);

        return $h;
    }

}