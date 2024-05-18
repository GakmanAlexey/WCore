<?php

namespace Mod\Core\Modul;

Class Install {

    public function __construct($h){
        
        $h["install"]["dir_list"] = scandir(MYPOS.SLASH."mod");
        array_splice($h["install"]["dir_list"] , 0 ,  2);

        $h["install"]["error"]  = [];
        $h["install"]["msg"]  = [];
        $h = $this->install_table($h);
        $h = $this->install_router($h);
        return $h;
    }


    public function install_table($h){
        foreach($h["install"]["dir_list"] as $mod_dir){
            $dir_list = scandir(MYPOS.SLASH."mod".SLASH.$mod_dir);
            array_splice($dir_list , 0 ,  2);            
            foreach($dir_list as $mod_dir_dir){
                if($mod_dir_dir  == "install"){
                    $file_list = scandir(MYPOS.SLASH."mod".SLASH.$mod_dir.SLASH.$mod_dir_dir);
                    array_splice($file_list , 0 ,  2);

                    foreach($file_list as $item_install){
                        $h["install"]["table"] = [];
                        $class_file = $pieces = explode(".", $item_install);
                        $class = ucfirst($class_file[0]); 
                        $class = '\\'."Mod".'\\'.ucfirst($mod_dir).'\\'.ucfirst($mod_dir_dir).'\\'.$class;

                        $result = new $class;
                        $funct  = "install_BD";
                        $h = $result->$funct($h);
                        foreach($h["install"]["table"] as $sting_sql){
                            $error = 0;
                            try {
                                $h["sql"]["db_connect"]->db_connect->exec($sting_sql);
                            } catch (\PDOException $e) {
                                $msg = "";
                                $msg = $e->getMessage();
                                $error = 1;
                            }
                            if($error == 1){
                                $h["install"]["error"][]  = "Ошибка Класс " . $class . "Возможно уже существует!";
                                $h["install"]["msg"] [] ="[ - ] " .$class ." Не установился!";
                            }else{
                                $h["install"]["msg"] [] ="[ + ] " .$class ." Установлен";
                            }                            
                        }
                        $h["install"]["table"] = [];
                    }     
                }
            }
        }
        var_dump($h["install"]["msg"]);
        return $h;
    }


    public function install_router($h){
        
        return $h;
    }
}