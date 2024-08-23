<?php

namespace Mod\User\Controller\Admin;

Class Permisonusdelet extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $gp = new \Mod\User\Modul\Admin\Pex;
        $h = $gp->show_list_group($h);
        $h = $gp->show_list_person($h);

        $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permison.php";
        $h = $this->show($h);

        return $h;
    }

}
