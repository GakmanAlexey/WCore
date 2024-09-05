<?php

namespace Mod\User\Controller\Admin;

Class Groupadd extends \Mod\Abs\Controller{
    public function index($h){
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.gp");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Admin\Group;
        $h = $gp->add_group($h);
        if($h["group"]["use"]){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupaddcompl.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupadd.php";
        }
        $h = $this->show($h);

        return $h;
    }

}
