<?php

namespace Mod\Pages\Modul\Admin;

Class Lmenu extends \Mod\Abstract\Lmenu{
    
    public function build($h){
        $ico = '
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.8333 8.95925V4.58258C23.8333 2.86008 23.14 2.16675 21.4175 2.16675H17.0408C15.3183 2.16675 14.625 2.86008 14.625 4.58258V8.95925C14.625 10.6817 15.3183 11.3751 17.0408 11.3751H21.4175C23.14 11.3751 23.8333 10.6817 23.8333 8.95925Z" stroke="#759FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3748 9.23008V4.31175C11.3748 2.78425 10.6815 2.16675 8.959 2.16675H4.58234C2.85984 2.16675 2.1665 2.78425 2.1665 4.31175V9.21925C2.1665 10.7576 2.85984 11.3642 4.58234 11.3642H8.959C10.6815 11.3751 11.3748 10.7576 11.3748 9.23008Z" stroke="#759FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.3748 21.4175V17.0408C11.3748 15.3183 10.6815 14.625 8.959 14.625H4.58234C2.85984 14.625 2.1665 15.3183 2.1665 17.0408V21.4175C2.1665 23.14 2.85984 23.8333 4.58234 23.8333H8.959C10.6815 23.8333 11.3748 23.14 11.3748 21.4175Z" stroke="#759FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.7085 18.9583H22.2085" stroke="#759FFF" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M18.9585 22.2083V15.7083" stroke="#759FFF" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        ';
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "constructor",              //Название на латинице
            "Конструктор " ,     //Название на Русском
            "constructor",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "constructor.admin"         //Привелегии
        );
        $ico = '
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.37484 15.5834H10.6248C14.1665 15.5834 15.5832 14.1667 15.5832 10.6251V6.37508C15.5832 2.83341 14.1665 1.41675 10.6248 1.41675H6.37484C2.83317 1.41675 1.4165 2.83341 1.4165 6.37508V10.6251C1.4165 14.1667 2.83317 15.5834 6.37484 15.5834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 1.41675V15.5834" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 6.02075H15.5835" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 10.9792H15.5835" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
        ';
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "constructor",                        //Родитель   
            "constructor-index",              //Название на латинице
            "Конструктор Главной" ,     //Название на Русском
            "constructor-index",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "constructor.admin"         //Привелегии
        );
        $ico = '
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.37484 15.5834H10.6248C14.1665 15.5834 15.5832 14.1667 15.5832 10.6251V6.37508C15.5832 2.83341 14.1665 1.41675 10.6248 1.41675H6.37484C2.83317 1.41675 1.4165 2.83341 1.4165 6.37508V10.6251C1.4165 14.1667 2.83317 15.5834 6.37484 15.5834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 1.41675V15.5834" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 6.02075H15.5835" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 10.9792H15.5835" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
        ';
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "constructor",                        //Родитель   
            "constructor-index",              //Название на латинице
            "Конструктор остальных" ,     //Название на Русском
            "constructor-index",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "constructor.admin"         //Привелегии
        );
        return $h;
        //$father, $name_en, $name_ru, $url, $prioritet, $action, $ico, $permission
    }
}
