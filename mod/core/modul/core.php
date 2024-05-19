<?php

namespace Mod\Core\Modul;

Class Core{
    public function __construct(){
        $h = [];
        $h["error"] = []; 
        $h = $this->get_url_page($h); 

        //Вызов sql
        $h['sql'] = [];
        $h['sql']["db_connect"] = new \Mod\Core\Modul\Sql;

        //Установка
        if(false){
            $h["install"] = [];
            $h =  new \Mod\Core\Modul\Install($h);
        }

        //Помощь view
        $h["view"] = [];
        $h["view"]["lists"] = [];

        $router = new \Mod\Core\Modul\Router();        
        $h = $router->main($h);  

/*
        //юзер        
        $h["cookie"] = [];
        $usr = new \Mod\User\Modul\User;        
        $h = $usr->metka($h);
        

        //Вызов Роутера
        $fw = new \Mod\Core\Modul\Router();
        $h = $fw->main($h);    
        
    */    

        return $h;
    }


    public function get_url_page($h){
        $h["url"] = [];
        $h['url']['all'] = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $h['url']['protocol'] = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
        $h['url']['domen'] = $_SERVER['HTTP_HOST'] ;

        $dir = explode('?', $_SERVER['REQUEST_URI']);
        $h['error']['url_dont_have_slash'] = false;
        if(substr($dir[0], -1) != "/") {
            $dir[0].= "/";
            $h['error']['url_dont_have_slash'] = true;
        }

        $h['url']['d_line'] = $dir[0];
        if(isset($dir[1])){
            $h['url']['d_of_get_line'] = $dir[1];
        }else{
            $h['url']['d_of_get_line'] = "";
        }
        $h['url']['d_array'] = explode('/', $h['url']['d_line']);
        $h['url']['direct_size'] = count($h['url']['d_array']) - 2;

        $h= $this->take_get($h);
        $h= $this->take_post($h);

        return $h;
        
    }

    public function take_get($h){
        if(!empty($_GET)){
            $h['url']['get'] = $_GET;  
        }      
        return $h;
    }

    public function take_post($h){
        if(!empty($_POST)){
            $h['url']['post'] = $_POST;
        };
        return $h;
    }
        


}
?>