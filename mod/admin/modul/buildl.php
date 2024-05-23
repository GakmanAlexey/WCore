<?php

namespace Mod\Admin\Modul;

Class Buildl {
    public $pre_data = [];
    public $pre_build_lvl1 = [];
    //Получить меню
    //Собрать меню
    //Сохранить меню
    public function temp(){
        $array = [
            "father" => "",
            "name_en" => "",
            "name_ru" => "",
            "url" => "",
            "prioritet" => "",
            "action" => "",
            "ico" => "",
            "permission" => ""
        ];
    }

    public function add_element($h, $father, $name_en, $name_ru, $url, $prioritet, $action, $ico, $permission){
        $array = [
            "father" => $father,
            "name_en" => $name_en,
            "name_ru" => $name_ru,
            "url" => $url,
            "prioritet" => $prioritet,
            "pos" => $action,
            "ico" => $ico,
            "permission" => $permission
        ];
        $this->pre_data[] = $array;

        return $h;
    }

    public function build_menu($h){
        $h = $this->build_lvl1($h);
        /*
            build_lvl1
            build_lvl2
            build_lvl3
            build_lvl4

        */
        return $h;
    }

    public function build_lvl1($h){
        foreach($this->pre_data as $item){
            if($item["father"] == "/"){
                $this->pre_build_lvl1[] = $item;
            }
        }
        $sort = new \Mod\Tools\Modul\Sort;
        $this->pre_build_lvl1 = $sort -> prioritet($this->pre_build_lvl1);
        return $h;
    }
}