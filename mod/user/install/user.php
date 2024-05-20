<?php

namespace Mod\User\Install;

Class User extends \Mod\Abstract\Install{

    public function install_BD($h){
        $h["install"]["table"][] = '
        CREATE TABLE users (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        login VARCHAR(255) NOT NULL, 
        pass VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        status_a VARCHAR(255) NOT NULL,
        reg_ip VARCHAR(255) NOT NULL,
        reg_time VARCHAR(255) NOT NULL,
        auth_ip VARCHAR(255) NOT NULL,
        auth_time VARCHAR(255) NOT NULL,
        hash_reg VARCHAR(255) NOT NULL
       )
    ';
        return $h;
    }

    public function install_Router($h){
        $array = [
            "url"           => "/user/",
            "class"         => "Mod\User\Controller\Index",
            "function"      => "index",
            "title"         => "Информация о регистрации и авторизации",
            "description"   => "Информация о регистрации и авторизации",
            "keys"          => "Информация о регистрации и авторизации",
            "name"          => "Пользователи",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/user/login/",
            "class"         => "Mod\User\Controller\Login",
            "function"      => "index",
            "title"         => "Авторизация",
            "description"   => "Авторизация",
            "keys"          => "Авторизация",
            "name"          => "Авторизация",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/user/register/",
            "class"         => "Mod\User\Controller\Register",
            "function"      => "index",
            "title"         => "Регистрация",
            "description"   => "Регистрация",
            "keys"          => "Регистрация",
            "name"          => "Регистрация",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/user/mailconfirm/",
            "class"         => "Mod\User\Controller\Mailconfirm",
            "function"      => "index",
            "title"         => "Подтверждение регистрации",
            "description"   => "Подтверждение регистрации",
            "keys"          => "Подтверждение регистрации",
            "name"          => "Подтверждение регистрации",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;


        $array = [
            "url"           => "/user/regconfirm/",
            "class"         => "Mod\User\Controller\Regconfirm",
            "function"      => "index",
            "title"         => "Успешная регистрация",
            "description"   => "Успешная регистрация",
            "keys"          => "Успешная регистрация",
            "name"          => "Успешная регистрация",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;

        $array = [
            "url"           => "/user/logconfirm/",
            "class"         => "Mod\User\Controller\Logconfirm",
            "function"      => "index",
            "title"         => "Успешная авторизация",
            "description"   => "Успешная авторизация",
            "keys"          => "Успешная авторизация",
            "name"          => "Успешная авторизация",
            "add_to_sitemap"=> true,
            "lastmod_s"     => time(),
            "change_s"      => "monthly",
            "priority_s"    => 0.5
        ];
        $h["install"]["line"][] = $array;
        return $h;
    }
    
}