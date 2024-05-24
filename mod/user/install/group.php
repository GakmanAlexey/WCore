<?php

namespace Mod\User\Install;

Class Group extends \Mod\Abstract\Install{

    public function install_BD($h){
        $h["install"]["table"][] = '
        CREATE TABLE group_list (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        group_name VARCHAR(255) NOT NULL, 
        name_ru VARCHAR(255) NOT NULL, 
        prefix VARCHAR(255) , 
        ico TEXT
       )
    ';

        $h["install"]["table"][] = '
        CREATE TABLE group_party (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        id_user VARCHAR(255) NOT NULL, 
        id_group VARCHAR(255) NOT NULL
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