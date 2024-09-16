<?php

namespace Mod\Artic\Install;

Class Artic extends \Mod\Abs\Install{

    public function install_BD($h){

        $h["install"]["table"][] = '
        CREATE TABLE artic (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        name_s VARCHAR(255) NOT NULL, 
        url_s VARCHAR(255) NOT NULL, 
        text_s TEXT, 
        show_s VARCHAR(255) NOT NULL, 
        img_s VARCHAR(255) NOT NULL, 
        date_create VARCHAR(255) NOT NULL
       )
    ';

        return $h;
    }

    public function install_Router($h){
       
        $array = [
            "url"           => "/statii/",
            "class"         => "Mod\Artic\Controller\Index",
            "function"      => "index",
            "title"         => "Каталог статей",
            "description"   => "Каталог статей",
            "keys"          => "Каталог статей",
            "name"          => "Каталог статей",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/statii/test/",
            "class"         => "Mod\Artic\Controller\Index",
            "function"      => "page",
            "title"         => "Статья - тестовая",
            "description"   => "Статья - тестовая",
            "keys"          => "Статья - тестовая",
            "name"          => "Статья - тестовая",
            "add_to_sitemap"=> true,
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