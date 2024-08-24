<?php

namespace Mod\User\Controller\Admin;

Class Groupedit extends \Mod\Abstract\Controller{
    public function index($h){
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.gp");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Admin\Group;
        $h = $gp->edit_group_load($h);
        $h = $gp->edit_group_save($h);
        if($h["group"]["use"] == "go_save"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupedit.php";
        }elseif(!$h["group"]["use"] == "error"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupediterror.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupeditresult.php";
        }
        $h = $this->show($h);

        return $h;
    }

}
