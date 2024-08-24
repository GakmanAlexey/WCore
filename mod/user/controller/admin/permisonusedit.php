<?php

namespace Mod\User\Controller\Admin;

Class Permisonusedit extends \Mod\Abstract\Controller{
    public function index($h){

        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.pex.user");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $gp = new \Mod\User\Modul\Admin\Pex;
        $h = $gp->take_item_for_id_us($h);

        if($h["admin"]["user"]["use_save_edit_us"] == "error"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusediterror.php";
        }elseif($h["admin"]["user"]["use_save_edit_us"] == "save"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonuseditsave.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusedit.php";
        }
        
        $h = $this->show($h);

        return $h;
    }

}
