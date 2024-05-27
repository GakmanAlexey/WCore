<?php

namespace Mod\User\Controller\Admin;

Class Groupdelet extends \Mod\Abstract\Controller{
    public function index($h){
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Admin\Group;
        $h = $gp ->get_delet_group($h);
        if($h["group"]["use"] == "what"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupdel.php";
        }elseif(!$h["group"]["use"] == "error"){
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupdelerror.php";
        }else{
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/groupdelresult.php";
        }
        //$h = $gp->edit_group_load($h);
        $h = $this->show($h);

        return $h;
    }

}
