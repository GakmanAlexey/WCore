<?php

namespace Mod\Admin\Modul;

Class Pex {


    public function seach_files($h){
        $h["pex"]["dir_list"] = scandir(MYPOS.SLASH."mod");
        array_splice($h["pex"]["dir_list"] , 0 ,  2);

            foreach($h["pex"]["dir_list"] as $mod_dir){
                $dir_list = scandir(MYPOS.SLASH."mod".SLASH.$mod_dir);
                array_splice($dir_list , 0 ,  2);            
                foreach($dir_list as $mod_dir_dir){
                    if($mod_dir_dir  == "modul"){
                        $path_file = MYPOS.SLASH."mod".SLASH.$mod_dir.SLASH."modul".SLASH."admin".SLASH."pex.php";
                        if(file_exists($path_file)){
                            $class = '\\'."Mod".'\\'.ucfirst($mod_dir).'\\'."Modul".'\\'."Admin".'\\'."pex";                     
                            $funct2  = "list_prem";
                            $result = new $class;
                            $h = $result->$funct2($h);   
                        }
                    }
                }
            }

        return $h;
    }

}