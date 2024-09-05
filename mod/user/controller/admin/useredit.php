<?php

namespace Mod\User\Controller\Admin;

Class Useredit extends \Mod\Abs\Controller{
    public function index($h){
        $pex = new \Mod\User\Modul\Admin\Pex;
        $h = $pex->allo($h, "admin.panel.system.user.user");
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );
        $gp = new \Mod\User\Modul\Group;
        $h = $gp->show_list_all($h);
        $usr = new \Mod\User\Modul\User;
        if(isset($h["url"]["post"]["edit_user"])){
            $h = $usr->start($h);
            $h = $usr->save_grom_admin_edit($h);
            $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/usereditres.php";
        }else{
            if(isset($h["url"]["get"]["id"])){
                $h = $usr->start($h);
                $h = $usr->take_date_for_user($h);
                $h = $usr->take_group_for_user($h);
                $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/useredit.php";
            }else{
                $h["view"]["lists"][] = MYPOS."/mod/user/view/admin/userediterror.php";
            }
        }
        

        
        $h = $this->show($h);

        return $h;
    }

}
