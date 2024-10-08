<?php

namespace Mod\User\Controller\Admin;

Class Permisongpedit extends \Mod\Abs\Controller{
    public function index($h){

        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.pex.gp");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $gp = new \Mod\User\Modul\Admin\Pex;
        $h = $gp->take_item_for_id_gp($h);

        if($h["admin"]["user"]["use_save_edit_gp"] == "error"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpediterror.php";
        }elseif($h["admin"]["user"]["use_save_edit_gp"] == "save"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpeditsave.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisongpedit.php";
        }
        
        $h = $this->show($h);

        return $h;
    }

}
