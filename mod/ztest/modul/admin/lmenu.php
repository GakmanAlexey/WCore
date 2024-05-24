<?php

namespace Mod\Ztest\Modul\Admin;

Class Lmenu extends \Mod\Abstract\Lmenu{
    
    public function build($h){
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
            "/",                        //Родитель   
            "modul",              //Название на латинице
            "Модули" ,     //Название на Русском
            "modul",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "modul",                        //Родитель   
            "bc",              //Название на латинице
            "Банер" ,     //Название на Русском
            "bc",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "modul",                        //Родитель   
            "cdek",              //Название на латинице
            "СДЭК" ,     //Название на Русском
            "cdek",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "modul",                        //Родитель   
            "telegram",              //Название на латинице
            "Телеграмм" ,     //Название на Русском
            "telegram",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "modul",                        //Родитель   
            "email",              //Название на латинице
            "Емаил" ,     //Название на Русском
            "email",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "modul",                        //Родитель   
            "ukassa",              //Название на латинице
            "Юкасса" ,     //Название на Русском
            "ukassa",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
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
            "tools",                        //Родитель   
            "webp",              //Название на латинице
            "Конвектор WEBP" ,     //Название на Русском
            "webp",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "tools",                        //Родитель   
            "cron",              //Название на латинице
            "Крон" ,     //Название на Русском
            "cron",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "tools",                        //Родитель   
            "terminal",              //Название на латинице
            "Терминал" ,     //Название на Русском
            "terminal",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "marketing",              //Название на латинице
            "Маркетинг" ,     //Название на Русском
            "marketing",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketing",                        //Родитель   
            "seo",              //Название на латинице
            "SEO" ,     //Название на Русском
            "seo",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketing",                        //Родитель   
            "sitemap",              //Название на латинице
            "Sitemap" ,     //Название на Русском
            "sitemap",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketing",                        //Родитель   
            "robots",              //Название на латинице
            "Robots.txt" ,     //Название на Русском
            "robots",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "marketing",                        //Родитель   
            "spam",              //Название на латинице
            "Рассылка" ,     //Название на Русском
            "spam",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "operation",              //Название на латинице
            "Операции" ,     //Название на Русском
            "operation",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "operation",                        //Родитель   
            "tiket",              //Название на латинице
            "Заявки" ,     //Название на Русском
            "tiket",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "operation",                        //Родитель   
            "bys",              //Название на латинице
            "Покупки" ,     //Название на Русском
            "bys",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "shop",              //Название на латинице
            "Магазин" ,     //Название на Русском
            "shop",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "shop",                        //Родитель   
            "categors",              //Название на латинице
            "Категории" ,     //Название на Русском
            "categors",              //Url адрес
            1,                          //Приоритет
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
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "shop",                        //Родитель   
            "params",              //Название на латинице
            "Параметры" ,     //Название на Русском
            "params",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "setting",              //Название на латинице
            "Настройки" ,     //Название на Русском
            "setting",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "setting",                        //Родитель   
            "lichens",              //Название на латинице
            "Лицензия" ,     //Название на Русском
            "lichens",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "setting",                        //Родитель   
            "update",              //Название на латинице
            "Обновления" ,     //Название на Русском
            "update",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "setting",                        //Родитель   
            "Mods",              //Название на латинице
            "Модули" ,     //Название на Русском
            "Mods",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
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
            "persona",              //Название на латинице
            "Пользователи" ,     //Название на Русском
            "persona",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "users",                        //Родитель   
            "permision",              //Название на латинице
            "Права" ,     //Название на Русском
            "permision",              //Url адрес
            1,                          //Приоритет
            1,                          //TODO Вид действия
            $ico,                    //Иконка
            "secret.admin"         //Привелегии
        );

        return $h;
        //$father, $name_en, $name_ru, $url, $prioritet, $action, $ico, $permission
    }
}
