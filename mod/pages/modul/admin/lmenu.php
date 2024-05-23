<?php

namespace Mod\Pages\Modul\Admin;

Class Lmenu extends \Mod\Abstract\Lmenu{
    
    public function build($h){
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "constructor",              //Название на латинице
            "Конструктор страниц" ,     //Название на Русском
            "constructor",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            "1.png",                    //Иконка
            "constructor.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "constructor",                        //Родитель   
            "constructor-index",              //Название на латинице
            "Конструктор Главной страницы" ,     //Название на Русском
            "constructor-index",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            "1.png",                    //Иконка
            "constructor.admin"         //Привелегии
        );
        return $h;
        //$father, $name_en, $name_ru, $url, $prioritet, $action, $ico, $permission
    }
}
