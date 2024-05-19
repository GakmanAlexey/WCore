<?php

namespace Mod\Abstract;

abstract class Install{
    
    //Отвечает за установку таблиц
    abstract public function install_BD($h);

    //Отвечает за добавления в роутер
    abstract public function install_Router($h);


}
