<?php

namespace Mod\User\Controller\Admin;

Class Userdelet extends \Mod\Abstract\Controller{
    public function index($h){
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.user");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $usr = new \Mod\User\Modul\User;
        $h = $usr->start($h);
        $h = $usr->delete_user($h);
        if($h["user"]["del_step"] == 1){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/userdell.php";
        }elseif($h["user"]["del_step"] == 2){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/userdellconf.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/userdellerror.php";
        }
        $h = $this->show($h);

        return $h;
    }

}
