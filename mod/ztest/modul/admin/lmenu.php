<?php

namespace Mod\Ztest\Modul\Admin;

Class Lmenu extends \Mod\Abstract\Lmenu{
    
    public function build($h){
        $ico = '
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.5834 9.20817V6.37484C15.5834 2.83317 14.1667 1.4165 10.6251 1.4165H6.37508C2.83341 1.4165 1.41675 2.83317 1.41675 6.37484V10.6248C1.41675 14.1665 2.83341 15.5832 6.37508 15.5832H10.6251" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M13.4584 15.5835V11.3335L12.0417 12.7502" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M13.4583 11.3335L14.8749 12.7502" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M7.04795 4.43408L6.3042 11.142" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M9.28623 4.43408L8.54248 11.142" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M4.62549 6.67236H11.3334" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M4.25 8.91064H10.9579" stroke="#171717" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        ';
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "site",                        //Родитель   
            "construct",              //Название на латинице
            "Конструктор" ,     //Название на Русском
            "construct",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "site",                        //Родитель   
            "seo",              //Название на латинице
            "СЕО" ,     //Название на Русском
            "seo",              //Url адрес
            2,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "site",                        //Родитель   
            "bc",              //Название на латинице
            "Банеры" ,     //Название на Русском
            "bc",              //Url адрес
            3,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );


        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "shop",                        //Родитель   
            "product",              //Название на латинице
            "Товары" ,     //Название на Русском
            "product",              //Url адрес
            2,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "shop",                        //Родитель   
            "categor",              //Название на латинице
            "Категории" ,     //Название на Русском
            "categor",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "shop",                        //Родитель   
            "haracterist",              //Название на латинице
            "Характеристики" ,     //Название на Русском
            "haracterist",              //Url адрес
            3,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );



        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "crm",                        //Родитель   
            "zakazi",              //Название на латинице
            "Заказы" ,     //Название на Русском
            "zakazi",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "crm",                        //Родитель   
            "zayavki",              //Название на латинице
            "Заявки" ,     //Название на Русском
            "zayavki",              //Url адрес
            2,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "crm",                        //Родитель   
            "clients",              //Название на латинице
            "Клиенты" ,     //Название на Русском
            "clients",              //Url адрес
            3,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "crm",                        //Родитель   
            "marketing",              //Название на латинице
            "Маркетинг" ,     //Название на Русском
            "marketing",              //Url адрес
            4,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );



        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "system",                        //Родитель   
            "tools",              //Название на латинице
            "Инструменты" ,     //Название на Русском
            "tools",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "system",                        //Родитель   
            "setting",              //Название на латинице
            "Настройки" ,     //Название на Русском
            "setting",              //Url адрес
            2,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "system",                        //Родитель   
            "moduls",              //Название на латинице
            "Модили" ,     //Название на Русском
            "moduls",              //Url адрес
            3,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "system",                        //Родитель   
            "yadro",              //Название на латинице
            "Ядро" ,     //Название на Русском
            "yadro",              //Url адрес
            4,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "system",                        //Родитель   
            "cron",              //Название на латинице
            "Планировщик заданий" ,     //Название на Русском
            "cron",              //Url адрес
            5,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );



        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketplays",                        //Родитель   
            "shablon",              //Название на латинице
            "Шаблоны" ,     //Название на Русском
            "shablon",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketplays",                        //Родитель   
            "moduls",              //Название на латинице
            "Модули" ,     //Название на Русском
            "moduls",              //Url адрес
            2,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketplays",                        //Родитель   
            "yslugs",              //Название на латинице
            "Услуги" ,     //Название на Русском
            "yslugs",              //Url адрес
            3,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );


        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "help",                        //Родитель   
            "instruct",              //Название на латинице
            "Инструкции" ,     //Название на Русском
            "instruct",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "help",                        //Родитель   
            "wiki",              //Название на латинице
            "ВИКИ" ,     //Название на Русском
            "wiki",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "help",                        //Родитель   
            "podderj",              //Название на латинице
            "Поддержка" ,     //Название на Русском
            "podderj",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        

        return $h;
        //$father, $name_en, $name_ru, $url, $prioritet, $action, $ico, $permission
    }
}
