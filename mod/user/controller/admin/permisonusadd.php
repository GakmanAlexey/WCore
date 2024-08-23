<?php

namespace Mod\User\Controller\Admin;

Class Permisonusadd extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->save_new_us($h);
        if($h["admin"]["user"]["use_save_us"]){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusaddcomp.php";
        }else{
            $h = $pex->show_list_us_target($h);
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/permisonusadd.php";
        }
        $h = $this->show($h);

        return $h;
    }

}
