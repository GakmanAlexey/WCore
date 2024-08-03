<?php

namespace Mod\Admin\Modul\Admin;

Class Pex extends \Mod\Abstract\Pex{
    
    public function list_prem($h){
        $h["pex"]["pre_allow"][] = [
            "admin.show" => "Просмотрт админ панели"
        ];
        return $h;
    }
}
