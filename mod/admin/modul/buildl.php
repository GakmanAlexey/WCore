<?php

namespace Mod\Admin\Modul;

Class Buildl {
    public $pre_data = [];
    public $pre_build_lvl1 = [];
    public $build_lvl1 = [];
    public $pre_build_lvl2 = [];
    public $pre_build_lvl3 = [];
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
        $h = $this->build_lvl2($h);
        $h = $this->build_lvl3($h);
        /*
            build_lvl1
            build_lvl2
            build_lvl3

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
        $h = $this->build_lvl1_save($h);
        return $h;
    }

    public function build_lvl1_save($h){
        $x = 0;
        foreach($this->pre_build_lvl1 as $item){
            $this->build_lvl1[$x] = $item;
            $x = $x +10000;
        }
        return $h;
    }


    public function build_lvl2($h){
        foreach($this->build_lvl1 as $father){
            foreach($this->pre_data as $item){
                if($item["father"] == $father["name_en"]){
                    $this->pre_build_lvl2[] = $item;
                }
            }
        }
        $sort = new \Mod\Tools\Modul\Sort;
        $this->pre_build_lvl2 = $sort -> prioritet($this->pre_build_lvl2);
        $h = $this->build_lvl2_save($h);
        return $h;
    }


    public function build_lvl2_save($h){
        $x = 0;
        $start = [];
        foreach($this->build_lvl1 as $key => $val){
            $start[$val["name_en"]] = $key;
        }

        foreach($this->pre_build_lvl2 as $item){
            foreach($start as $key => $val){
                if($item["father"] == $key){
                    $start[$key] = ($val + 100);
                    $this->build_lvl1[$start[$key]] = $item;
                }

            }
        }
        return $h;
    }


    public function build_lvl3($h){
        foreach($this->pre_build_lvl2 as $father){
            foreach($this->pre_data as $item){
                if($item["father"] == $father["name_en"]){
                    $this->pre_build_lvl3[] = $item;
                }
            }
        }
        $sort = new \Mod\Tools\Modul\Sort;
        $this->pre_build_lvl3 = $sort -> prioritet($this->pre_build_lvl3);
        $h = $this->build_lvl3_save($h);
        return $h;
    }


    public function build_lvl3_save($h){
        $x = 0;
        $start = [];
        foreach($this->build_lvl1 as $key => $val){
            $start[$val["name_en"]] = $key;
        }

        foreach($this->pre_build_lvl3 as $item){
            foreach($start as $key => $val){
                if($item["father"] == $key){
                    $start[$key] = ($val + 1);
                    $this->build_lvl1[$start[$key]] = $item;
                }

            }
        }
        return $h;
    }
}