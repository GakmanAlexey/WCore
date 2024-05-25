<?php

namespace Mod\User\Controller\Admin;

Class Group extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Group;
        $h = $gp->show_list($h);

        $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/group.php";
        $h = $this->show($h);

        return $h;
    }

}
