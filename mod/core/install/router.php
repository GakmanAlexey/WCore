<?php

namespace Mod\Core\Install;

Class Router extends \Mod\Abstract\Install{

    public function install_BD($h){
        $h["install"]["table"][] = '
        CREATE TABLE router (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        url VARCHAR(255) NOT NULL, 
        class VARCHAR(255) NOT NULL,
        funct VARCHAR(255) NOT NULL
       )
    ';
        return $h;
    }

    public function install_Router($h){

        return $h;
    }
    
}