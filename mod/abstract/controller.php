<?php

namespace Mod\Abstract;

abstract class Controller{
    //Определитель способа отображения.
    public $type_show;

    public function show($h, $type = "default", $cash = false){
        $this->type_show = $type ;
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
        $h["view"]["page_load"] = MYPOS."/mod/pages/view/admin/head.php";              
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



}
