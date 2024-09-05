<?php

namespace Mod\User\Controller\Admin;

Class Permisongpadd extends \Mod\Abs\Controller{
    public function index($h){

        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.pex.gp");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->save_new_gp($h);
        if($h["admin"]["user"]["use_save_gp"]){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpaddcomp.php";
        }else{
            $h = $pex->show_list_gp_target($h);
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpadd.php";
        }
        $h = $this->show($h);

        return $h;
    }

}
