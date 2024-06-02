<?php

namespace Mod\User\Install;

Class Permision extends \Mod\Abstract\Install{

    public function install_BD($h){
        return $h;
    }

    public function install_Router($h){

        $array = [
            "url"           => "/admin/system/users/permison/",
            "class"         => "Mod\User\Controller\Admin\Permison",
            "function"      => "index",
            "title"         => "Группы",
            "description"   => "Группы",
            "keys"          => "Группы",
            "name"          => "Группы",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/group/add/",
            "class"         => "Mod\User\Controller\Admin\Permisonadd",
            "function"      => "index",
            "title"         => "Добавление группы",
            "description"   => "Добавление группы",
            "keys"          => "Добавление группы",
            "name"          => "Добавление группы",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/group/edit/",
            "class"         => "Mod\User\Controller\Admin\Permisondit",
            "function"      => "index",
            "title"         => "Редактирование группы",
            "description"   => "Редактирование группы",
            "keys"          => "Редактирование группы",
            "name"          => "Редактирование группы",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/group/delet/",
            "class"         => "Mod\User\Controller\Admin\Permisondelet",
            "function"      => "index",
            "title"         => "Удаление группы",
            "description"   => "Удаление группы",
            "keys"          => "Удаление группы",
            "name"          => "Удаление группы",
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