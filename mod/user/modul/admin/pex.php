<?php

namespace Mod\User\Modul\Admin;

Class Pex extends \Mod\Abstract\Pex{
    
    public function list_prem($h){ 
        $h["pex"]["pre_allow"][] = [
        "user.admin.user.show" => "Просмотр админ панели пользователей"
        ];
        $h["pex"]["pre_allow"][] = [
        "user.admin.group.show" => "Просмотр админ панели групп"
        ];
        $h["pex"]["pre_allow"][] = [
        "user.admin.pex.show" => "Просмотр админ панели привелегий"
        ];
        return $h;
    }
}
