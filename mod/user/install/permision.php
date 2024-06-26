<?php

namespace Mod\User\Install;

Class Permision extends \Mod\Abstract\Install{

    public function install_BD($h){
        $h["install"]["table"][] = '
        CREATE TABLE permission_list (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        type_s VARCHAR(255) NOT NULL, 
        id_name VARCHAR(255) NOT NULL,
        per_on TEXT,
        per_off TEXT 
       )
    ';
        return $h;
    }

    public function install_Router($h){

        $array = [
            "url"           => "/admin/system/users/permison/",
            "class"         => "Mod\User\Controller\Admin\Permison",
            "function"      => "index",
            "title"         => "Привелегии",
            "description"   => "Привелегии",
            "keys"          => "Привелегии",
            "name"          => "Привелегии",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/permison/add/",
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
            "url"           => "/admin/system/users/permison/edit/",
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
            "url"           => "/admin/system/users/permison/delet/",
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