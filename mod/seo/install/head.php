<?php

namespace Mod\Seo\Install;

Class Head extends \Mod\Abs\Install{

    public function install_BD($h){
        $h["install"]["table"][] = '
        CREATE TABLE heads (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        url VARCHAR(255) NOT NULL, 
        title_q VARCHAR(255) NOT NULL, 
        description_q VARCHAR(255) NOT NULL,
        keys_q VARCHAR(255) NOT NULL,
        name_q VARCHAR(255) NOT NULL
       )
    ';
        return $h;
    }

    public function install_Router($h){
        
        return $h;
    }

    public function install_Congif($h){

        return $h;
    }
    
}