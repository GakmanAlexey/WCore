<?php

namespace Mod\Lc\Install;

Class Lc extends \Mod\Abs\Install{

    public function install_BD($h){

        $h["install"]["table"][] = '
        CREATE TABLE user_balance (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        id_user VARCHAR(255) NOT NULL, 
        balance VARCHAR(255) NOT NULL
       )
    ';


        $h["install"]["table"][] = '
        CREATE TABLE user_data_lc (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        user_id VARCHAR(255) , 
        user_name VARCHAR(255) , 
        user_mail VARCHAR(255) , 
        user_phone VARCHAR(255) 
    )
    ';

        return $h;
    }

    public function install_Router($h){
       
        $array = [
            "url"           => "/lc/",
            "class"         => "Mod\Lc\Controller\Index",
            "function"      => "index",
            "title"         => "Личный кабинет",
            "description"   => "Личный кабинет",
            "keys"          => "Личный кабинет",
            "name"          => "Личный кабинет",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/lc/balance/",
            "class"         => "Mod\Lc\Controller\Index",
            "function"      => "balance",
            "title"         => "Личный кабинет - баланс",
            "description"   => "Личный кабинет - баланс",
            "keys"          => "Личный кабинет - баланс",
            "name"          => "Личный кабинет - баланс",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;




       
        $array = [
            "url"           => "/lc/cods/",
            "class"         => "Mod\Lc\Controller\Index",
            "function"      => "history",
            "title"         => "Личный кабинет - коды",
            "description"   => "Личный кабинет - коды",
            "keys"          => "Личный кабинет - коды",
            "name"          => "Личный кабинет - коды",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

       
       
        

       
        return $h;
    }

    public function install_Congif($h){

        return $h;
    }
    
}