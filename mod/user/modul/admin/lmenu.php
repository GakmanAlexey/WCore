<?php

namespace Mod\User\Modul\Admin;

Class Lmenu{
    
    public function build($h){
        $ico ="";

        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "users",              //Название на латинице
            "Пользователи" ,     //Название на Русском
            "users",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
            $h = $h["lmenu"]["class"]->add_element(
                $h,                         //Хелпер
                "users",                        //Родитель   
                "group",              //Название на латинице
                "Группы" ,     //Название на Русском
                "group",              //Url адрес
                1,                          //Приоритет
                1,                          //TODO Вид действия
                $ico,                    //Иконка
                "secret.admin"         //Привелегии
            );
            $h = $h["lmenu"]["class"]->add_element(
                $h,                         //Хелпер
                "users",                        //Родитель   
                "user",              //Название на латинице
                "Пользователи" ,     //Название на Русском
                "user",              //Url адрес
                1,                          //Приоритет
                1,                          //TODO Вид действия
                $ico,                    //Иконка
                "secret.admin"         //Привелегии
            );
            $h = $h["lmenu"]["class"]->add_element(
                $h,                         //Хелпер
                "users",                        //Родитель   
                "permison",              //Название на латинице
                "Привелегии" ,     //Название на Русском
                "permison",              //Url адрес
                1,                          //Приоритет
                1,                          //TODO Вид действия
                $ico,                    //Иконка
                "secret.admin"         //Привелегии
            );
        return $h;
    }



}
