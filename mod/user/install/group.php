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

        $array = [
            "url"           => "/admin/system/users/group/",
            "class"         => "Mod\User\Controller\Admin\Group",
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
            "class"         => "Mod\User\Controller\Admin\Groupadd",
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
            "class"         => "Mod\User\Controller\Admin\Groupedit",
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
            "class"         => "Mod\User\Controller\Admin\Groupdelet",
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