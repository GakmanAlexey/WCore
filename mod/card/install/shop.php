<?php

namespace Mod\Shop\Install;

Class Shop extends \Mod\Abs\Install{

    public function install_BD($h){

        $h["install"]["table"][] = '
        CREATE TABLE shop_catalog (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        father VARCHAR(255) NOT NULL, 
        name_s VARCHAR(255) NOT NULL,
        img VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        show_s VARCHAR(255) NOT NULL,
        opis TEXT NOT NULL,
        html_block TEXT 
       )
    ';


        $h["install"]["table"][] = '
        CREATE TABLE shop_item (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        father_cat VARCHAR(255) NOT NULL, 
        name_s VARCHAR(255) NOT NULL,
        img VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        show_s VARCHAR(255) NOT NULL,
        opis TEXT NOT NULL,
        its_card_key TEXT NOT NULL,
        prise_i VARCHAR(255) NOT NULL,
        prise_old VARCHAR(255) NOT NULL,
        cound_in VARCHAR(255) NOT NULL,
        html_block TEXT 
    )
';

        return $h;
    }

    public function install_Router($h){
       
        $array = [
            "url"           => "/1c/",
            "class"         => "Mod\Shop\Controller\Index",
            "function"      => "show_cat",
            "title"         => "Коды 1с",
            "description"   => "Коды 1с",
            "keys"          => "Коды 1с",
            "name"          => "Коды 1с",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/ofd/",
            "class"         => "Mod\Shop\Controller\Index",
            "function"      => "show_cat",
            "title"         => "Коды ofd",
            "description"   => "Коды ofd",
            "keys"          => "Коды ofd",
            "name"          => "Коды ofd",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/ofd/kod1/",
            "class"         => "Mod\Shop\Controller\Index",
            "function"      => "item",
            "title"         => "Коды ofd код1",
            "description"   => "Коды ofd код1",
            "keys"          => "Коды ofd код1",
            "name"          => "Коды ofd код1",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/ofd/kod2/",
            "class"         => "Mod\Shop\Controller\Index",
            "function"      => "item",
            "title"         => "Коды ofd код2",
            "description"   => "Коды ofd код2",
            "keys"          => "Коды ofd код2",
            "name"          => "Коды ofd код2",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/ofd/kod3/",
            "class"         => "Mod\Shop\Controller\Index",
            "function"      => "item",
            "title"         => "Коды ofd код3",
            "description"   => "Коды ofd код3",
            "keys"          => "Коды ofd код3",
            "name"          => "Коды ofd код3",
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