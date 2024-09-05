<?php

namespace Mod\Abs;

abstract class Install{
    
    //Отвечает за установку таблиц
    abstract public function install_BD($h);

    //Отвечает за добавления в роутер
    abstract public function install_Router($h);

    //Отвечает за добавления в роутер
    abstract public function install_Congif($h);

    public function build_config($h){
        $file_adres = $h["install"]["build_adress"] ;
        $text = $h["install"]["build_text"] ;
        if (!file_exists($file_adres)) {
            file_put_contents($file_adres, $text);
        }
        
        return $h;
    }


}
