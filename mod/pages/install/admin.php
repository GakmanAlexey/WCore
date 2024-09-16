<?php

namespace Mod\Pages\Install;

Class Admin extends \Mod\Abs\Install{

    public function install_BD($h){
        return $h;
    }

    public function install_Router($h){
        $array = [
            "url"           => "/admin/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Админ панель",
            "description"   => "Админ панель",
            "keys"          => "Админ панель",
            "name"          => "Админ панель",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/onas/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "onas",
            "title"         => "О нас",
            "description"   => "О нас",
            "keys"          => "О нас",
            "name"          => "О нас",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/contacts/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "contacts",
            "title"         => "Конаткты",
            "description"   => "Конаткты",
            "keys"          => "Конаткты",
            "name"          => "Конаткты",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;










        $array = [
            "url"           => "/vozvrat/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "vozrat",
            "title"         => "Возврат",
            "description"   => "Возврат",
            "keys"          => "Возврат",
            "name"          => "Возврат",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/nadtroikiodf/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "nastroiki",
            "title"         => "Настройки ОФД",
            "description"   => "Настройки ОФД",
            "keys"          => "Настройки ОФД",
            "name"          => "Настройки ОФД",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/politic/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "polit",
            "title"         => "Политика конфиденциальности",
            "description"   => "Политика конфиденциальности",
            "keys"          => "Политика конфиденциальности",
            "name"          => "Политика конфиденциальности",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/soglasie/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "sogl",
            "title"         => "Пользовательское соглашение",
            "description"   => "Пользовательское соглашение",
            "keys"          => "Пользовательское соглашение",
            "name"          => "Пользовательское соглашение",
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