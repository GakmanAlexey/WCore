<?php

namespace Mod\Abs;

abstract class Controller{
    //Определитель способа отображения.
    public $type_show;

    public function show($h,  $cash = false){
        $h["view"]["pagetype"] = $this->type_show;
        $h["logclass"] = new \Mod\Core\Modul\Logs;

        switch ($this->type_show ) {
            case "default":
                $h = $this->default($h);
                break;
            case "empty":
                $h = $this->empty($h);
                break;
            case "admin":
                $h = $this->admin($h);
                break;
            case "ajax":
                $h = $this->break($h);
                break;
            case "api":
                $h = $this->api($h);
                break;
            case "errors":
                $h = $this->errors($h);
                break;
        }

        return $h;
    }

    public function draw($h){        
        foreach($h["view"]["lists"] as $p){
            $h["view"]["page_load"]  = $p;         
            $h = $this->links($h);
        }
        return $h;
    }

    public function links($h){        
        if (file_exists($h["view"]["page_load"])) {
            include  $h["view"]["page_load"];            
        }else{                
            $m = "Не найдет файл: ".$h["view"]["page_load"];
            $h["logclass"] ->loging("view", $m);
        }
        return $h;
    }

    public function default($h){
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/head.php";              
        $h = $this->links($h);
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/header.php";              
        $h = $this->links($h);

        $this->draw($h);

        $h["view"]["page_load"]= MYPOS."/mod/pages/view/contacts.php";            
        $h = $this->links($h);
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/footer.php";              
        $h = $this->links($h);

        return $h;
    }

    public function empty($h){
        $this->draw($h);
        return $h;
    }

    public function admin($h){
        /*
        Собрать левое меню.
        Собрать уведомления
        */
        $build_l_menu = new \Mod\Pages\Modul\Builderlmenu;
        $h = $build_l_menu ->build($h);
        $build_pex = new \Mod\Admin\Modul\Pex;
        $h = $build_pex ->seach_files($h);

        $h["view"]["page_load"] = MYPOS."/mod/pages/view/head.php";              
        $h = $this->links($h);
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/admin/lmenu.php";              
        $h = $this->links($h);
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/admin/header.php";              
        $h = $this->links($h);

        $this->draw($h);

        $h["view"]["page_load"] = MYPOS."/mod/pages/view/admin/rmenu.php";              
        $h = $this->links($h);
        return $h;
    }

    public function ajax($h){
        $this->draw($h);
        return $h;
    }

    public function api($h){
        $this->draw($h);
        return $h;
    }

    public function errors($h){
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/head.php";              
        $h = $this->links($h);
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/header.php";              
        $h = $this->links($h);

        $this->draw($h);

        $h["view"]["page_load"] = MYPOS."/mod/pages/view/footer.php";              
        $h = $this->links($h);
        return $h;
    }

    public function cashe_start($h){
        $h["cache"]["isset"] = false;
        if(!$h["cache"]["job"]) return $h;
        $file_name = md5($h["url"]["d_line"]."g".$h["url"]["d_of_get_line"]);
        $h["cache"]["filename"] = MYPOS.SLASH.'cache'.SLASH.$file_name.'.cache'; //         

        if (file_exists($h["cache"]["filename"])) {
            $h["cache"]["isset"] = true;
            $c = @file_get_contents($h["cache"]["filename"] );
            echo $c;
            return $h;
        } 

        ob_start();
        return $h;
    }

    public function cashe_end($h){
        if(!$h["cache"]["job"]) return $h;
        $c = ob_get_contents();
        file_put_contents($h["cache"]["filename"], $c);
        return $h;
    }



}
