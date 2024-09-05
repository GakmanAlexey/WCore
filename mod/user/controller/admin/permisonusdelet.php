<?php

namespace Mod\User\Controller\Admin;

Class Permisonusdelet extends \Mod\Abs\Controller{
    public function index($h){

        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.pex.user");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $gp = new \Mod\User\Modul\Admin\Pex;
        $h = $gp->go_delet_us_pex($h);

        if($h["admin"]["user"]["use_save_dell_us"] == "error"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusdellerror.php";
        }elseif($h["admin"]["user"]["use_save_dell_us"] == "save"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusdellsave.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusdell.php";
        }

        $h = $this->show($h);
        return $h;
    }

}
