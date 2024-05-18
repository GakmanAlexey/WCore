<?php

namespace Mod\Seo\Install;

Class Sitemap extends \Mod\Abstract\Install{

    public function install_BD($h){
        $h["install"]["table"][] = '
        CREATE TABLE sitemap (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(id),
        url VARCHAR(255) NOT NULL, 
        lastmod_s VARCHAR(255) NOT NULL,
        change_s VARCHAR(255) NOT NULL,
        priority_s VARCHAR(255) NOT NULL
       )
    ';
        return $h;
    }

    public function install_Router($h){
        
        return $h;
    }
    
}