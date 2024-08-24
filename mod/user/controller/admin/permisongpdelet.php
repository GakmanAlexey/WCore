<?php

namespace Mod\User\Controller\Admin;

Class Permisongpdelet extends \Mod\Abstract\Controller{
    public function index($h){

        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.pex.gp");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $gp = new \Mod\User\Modul\Admin\Pex;
        $h = $gp->go_delet_gp_pex($h);

        if($h["admin"]["user"]["use_pex_dell_gp"] == "error"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpdellerror.php";
        }elseif($h["admin"]["user"]["use_pex_dell_gp"] == "save"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpdellsave.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpdell.php";
        }

        $h = $this->show($h);

        return $h;
    }

}
