<?php

namespace Mod\User\Controller\Admin;

Class Permisongpadd extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Admin\Group;
        $h = $gp->add_group($h);
        if($h["group"]["use"]){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupaddcompl.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonadd.php";
        }
        $h = $this->show($h);

        return $h;
    }

}
