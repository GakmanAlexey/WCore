<?php

namespace Mod\Card\Install;

Class Card extends \Mod\Abs\Install{

    public function install_BD($h){

        $h["install"]["table"][] = '
        CREATE TABLE card_user (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        type_user VARCHAR(255) NOT NULL, 
        id_user VARCHAR(255) NOT NULL,
        id_product VARCHAR(255) NOT NULL,
        count VARCHAR(255) NOT NULL,
        time_create VARCHAR(255) NOT NULL
       )
    ';

        return $h;
    }

    public function install_Router($h){
       
        $array = [
            "url"           => "/cardlist/",
            "class"         => "Mod\Card\Controller\Index",
            "function"      => "show_card",
            "title"         => "корзина",
            "description"   => "корзина",
            "keys"          => "корзина",
            "name"          => "корзина",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


       
        $array = [
            "url"           => "/cardlistadd/",
            "class"         => "Mod\Card\Controller\Index",
            "function"      => "add_to_card",
            "title"         => "корзина",
            "description"   => "корзина",
            "keys"          => "корзина",
            "name"          => "корзина",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;




       
        $array = [
            "url"           => "/card/",
            "class"         => "Mod\Card\Controller\Index",
            "function"      => "show_full_card",
            "title"         => "корзина",
            "description"   => "корзина",
            "keys"          => "корзина",
            "name"          => "корзина",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

       
       
        $array = [
            "url"           => "/card/operation/",
            "class"         => "Mod\Card\Controller\Index",
            "function"      => "operation",
            "title"         => "корзина",
            "description"   => "корзина",
            "keys"          => "корзина",
            "name"          => "корзина",
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