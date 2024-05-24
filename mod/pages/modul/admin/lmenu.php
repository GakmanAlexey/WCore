<?php

namespace Mod\Pages\Modul\Admin;

Class Lmenu extends \Mod\Abstract\Lmenu{
    
    public function build($h){
        $ico = '
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.2078 13.4584V3.54175C15.2078 2.12508 14.4995 1.41675 13.0828 1.41675H10.2495C8.83285 1.41675 8.12451 2.12508 8.12451 3.54175V13.4584C8.12451 14.8751 8.83285 15.5834 10.2495 15.5834H13.0828C14.4995 15.5834 15.2078 14.8751 15.2078 13.4584Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M8.12451 4.25H11.6662" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M8.12451 12.75H10.9578" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M8.12451 9.8811L11.6662 9.91652" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M8.12451 7.08325H10.2495" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M3.88866 1.41675C2.73408 1.41675 1.79199 2.35883 1.79199 3.50633V12.6863C1.79199 13.0051 1.92658 13.4867 2.08949 13.763L2.67033 14.7263C3.33616 15.8384 4.43408 15.8384 5.09991 14.7263L5.68074 13.763C5.84366 13.4867 5.97824 13.0051 5.97824 12.6863V3.50633C5.97824 2.35883 5.03616 1.41675 3.88866 1.41675Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M5.97824 4.95825H1.79199" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        ';
        $h = $h["lmenu"]["class"]->add_element(
            $h,                         //Хелпер
            "/",                        //Родитель   
            "constructor",              //Название на латинице
            "Конструктор страниц" ,     //Название на Русском
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
            "Конструктор Главной страницы" ,     //Название на Русском
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
