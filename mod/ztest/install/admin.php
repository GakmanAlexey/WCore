<?php

namespace Mod\Ztest\Install;

Class Admin extends \Mod\Abstract\Install{

    public function install_BD($h){
        return $h;
    }

    public function install_Router($h){
        $array = [
            "url"           => "/admin/site/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Тест",
            "description"   => "Тест",
            "keys"          => "Тест",
            "name"          => "Тест",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/shop/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Тест",
            "description"   => "Тест",
            "keys"          => "Тест",
            "name"          => "Тест",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/crm/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Тест",
            "description"   => "Тест",
            "keys"          => "Тест",
            "name"          => "Тест",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Тест",
            "description"   => "Тест",
            "keys"          => "Тест",
            "name"          => "Тест",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/marketplays/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Тест",
            "description"   => "Тест",
            "keys"          => "Тест",
            "name"          => "Тест",
            "add_to_sitemap"=> false,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/help/",
            "class"         => "Mod\Pages\Controller\Admin\Index",
            "function"      => "index",
            "title"         => "Тест",
            "description"   => "Тест",
            "keys"          => "Тест",
            "name"          => "Тест",
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