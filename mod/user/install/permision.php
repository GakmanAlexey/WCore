<?php

namespace Mod\User\Install;

Class Permision extends \Mod\Abs\Install{

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
            "url"           => "/admin/system/users/permisongp/",
            "class"         => "Mod\User\Controller\Admin\Permisongp",
            "function"      => "index",
            "title"         => "Привелегии групп",
            "description"   => "Привелегии групп",
            "keys"          => "Привелегии групп",
            "name"          => "Привелегии групп",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/permisongp/add/",
            "class"         => "Mod\User\Controller\Admin\Permisongpadd",
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
            "url"           => "/admin/system/users/permisongp/edit/",
            "class"         => "Mod\User\Controller\Admin\Permisongpedit",
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
            "url"           => "/admin/system/users/permisongp/delet/",
            "class"         => "Mod\User\Controller\Admin\Permisongpdelet",
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

        $array = [
            "url"           => "/admin/system/users/permisonus/",
            "class"         => "Mod\User\Controller\Admin\Permisonus",
            "function"      => "index",
            "title"         => "Привелегии пользователя",
            "description"   => "Привелегии пользователя",
            "keys"          => "Привелегии пользователя",
            "name"          => "Привелегии пользователя" ,
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/permisonus/add/",
            "class"         => "Mod\User\Controller\Admin\Permisonusadd",
            "function"      => "index",
            "title"         => "Добавление пользователя",
            "description"   => "Добавление пользователя",
            "keys"          => "Добавление пользователя",
            "name"          => "Добавление пользователя",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/permisonus/edit/",
            "class"         => "Mod\User\Controller\Admin\Permisonusedit",
            "function"      => "index",
            "title"         => "Редактирование пользователя",
            "description"   => "Редактирование пользователя",
            "keys"          => "Редактирование пользователя",
            "name"          => "Редактирование пользователя",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/admin/system/users/permisonus/delet/",
            "class"         => "Mod\User\Controller\Admin\Permisonusdelet",
            "function"      => "index",
            "title"         => "Удаление пользователя",
            "description"   => "Удаление пользователя",
            "keys"          => "Удаление пользователя",
            "name"          => "Удаление пользователя",
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