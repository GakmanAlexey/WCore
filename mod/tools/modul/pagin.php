<?php

namespace Mod\Tools\Modul;
Class Pagin{   
    public $item_in_page = 20;
    public $line = [];

    public function standart($h,$table_name)
    {
        $h["pagin"] = [];
        $h["pagin"]["table_name"] = $table_name;
        //получить количество элементов
        $h = $this->count_el($h);
        //получить количество страниц
        $h = $this->count_page($h);
        //получить определить текущую страницу
        $h = $this->take_this_possition($h);
        //сформировать с какого по какую вывести.
        $h = $this->take_line($h);
        //сформировать переключатели снизу.
        $h["pagin"]["start_sql"] = $this->item_in_page * ($h["pagin"]["this_page"] - 1);
        $h["pagin"]["page_lim_sql"] = $this->item_in_page;
        return $h;
    }
    public function count_el($h)
    {

        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT count(*) FROM `".$h["pagin"]["table_name"]."` ");
        $sth1->execute(array());
        $h["pagin"]["count_el"]  = $sth1->fetchColumn(); 

        return $h;
    }

    public function count_page($h){
        $h["pagin"]["page_count"] = ceil($h["pagin"]["count_el"] / $this->item_in_page);
        return $h;
    }

    public function take_this_possition($h){
        if(!isset($h["url"]["get"]["page"])){
            $pre_page = 1;
        }else{
            $pre_page = $h["url"]["get"]["page"];
        }
        if($pre_page < 1){
            $pre_page  = 1;
        }
        if($pre_page > $h["pagin"]["page_count"] ){
            $pre_page  = $h["pagin"]["page_count"] ;
        }
        if($pre_page != ceil($pre_page)){
            $pre_page  = 1;
        }
        $h["pagin"]["this_page"] = $pre_page;
        return $h;
    }

    public function take_line($h){
        if($h["pagin"]["page_count"] <= 5){
            $x = 1;
            while($x < ($h["pagin"]["page_count"] +1)){
                $line[] = $x;

                $x++;
            }
        }else{
            if($h["pagin"]["this_page"]  != 1){
                $line[] = "l";
            }
            if($h["pagin"]["this_page"] <= 3){
                $line[] = 1;
                $line[] = 2;
                $line[] = 3;
                $line[] = 4;
                $line[] = 5;
            }else if($h["pagin"]["this_page"] >= ($h["pagin"]["page_count"] - 2) ){

                $line[] = ($h["pagin"]["page_count"] - 4);
                $line[] = ($h["pagin"]["page_count"] - 3);
                $line[] = ($h["pagin"]["page_count"] - 2);
                $line[] = ($h["pagin"]["page_count"] - 1);
                $line[] = $h["pagin"]["page_count"];
            }else{

                $line[] = ($h["pagin"]["this_page"] - 2);
                $line[] = ($h["pagin"]["this_page"] - 1);
                $line[] = ($h["pagin"]["this_page"] );
                $line[] = ($h["pagin"]["this_page"] + 1);
                $line[] = ($h["pagin"]["this_page"] + 2);
            }

            if($h["pagin"]["this_page"]  != $h["pagin"]["page_count"] ){
                $line[] = "r";
            }
        }

        $h["pagin"]["page_line"] = $line;
        return $h;
    }

}
