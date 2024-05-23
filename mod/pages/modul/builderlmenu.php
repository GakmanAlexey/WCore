<?php

namespace Mod\Pages\Modul;

Class Builderlmenu{

    public function build($h){
        $h["lmenu"]=[];
        $h["lmenu"]["class"] = new \Mod\Admin\Modul\Buildl;
        $this->seach_files($h);
        return $h;
    }

    public function seach_files($h){
        $h["lmenu"]["dir_list"] = scandir(MYPOS.SLASH."mod");
        array_splice($h["lmenu"]["dir_list"] , 0 ,  2);

            foreach($h["lmenu"]["dir_list"] as $mod_dir){
                $dir_list = scandir(MYPOS.SLASH."mod".SLASH.$mod_dir);
                array_splice($dir_list , 0 ,  2);            
                foreach($dir_list as $mod_dir_dir){
                    if($mod_dir_dir  == "modul"){
                        $path_file = MYPOS.SLASH."mod".SLASH.$mod_dir.SLASH."modul".SLASH."admin".SLASH."lmenu.php";
                        if(file_exists($path_file)){
                            $class = '\\'."Mod".'\\'.ucfirst($mod_dir).'\\'."Modul".'\\'."Admin".'\\'."Lmenu";                     
                            $funct2  = "build";
                            $result = new $class;
                            $h = $result->$funct2($h);   
                        }


                    }
                }
            }
            $h = $h["lmenu"]["class"]->build_menu($h);
            ksort($h["lmenu"]["class"]->build_lvl1);

        return $h;
    }

}
