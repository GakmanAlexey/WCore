<?php

namespace Mod\User\Modul\Admin;

Class Lmenu{
    
    public function build($h){
        $ico ='
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.2002 13.5875C15.0752 13.575 14.9252 13.575 14.7877 13.5875C11.8127 13.4875 9.4502 11.05 9.4502 8.05C9.4502 4.9875 11.9252 2.5 15.0002 2.5C18.0627 2.5 20.5502 4.9875 20.5502 8.05C20.5377 11.05 18.1752 13.4875 15.2002 13.5875Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M8.95039 18.2C5.92539 20.225 5.92539 23.525 8.95039 25.5375C12.3879 27.8375 18.0254 27.8375 21.4629 25.5375C24.4879 23.5125 24.4879 20.2125 21.4629 18.2C18.0379 15.9125 12.4004 15.9125 8.95039 18.2Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>';

        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "system",                        //Родитель   
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
