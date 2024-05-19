<?php

namespace Mod\Core\Modul;

Class Router{
    public static $h = [];

    public function main($h){
        $h["Router"] = [];
        $h["Router"]["status"] = "Работает";
        $h = $this->redirect300($h);
        $h = $this->go($h);
        
        return $h;
    }

    public function go($h){
        $connect = $h["sql"]["db_connect"]->db_connect;
        $sth = $connect->prepare("SELECT * FROM `router` WHERE `url` = ?");
        $sth->execute(array($h["url"]["d_line"]));
        $result_sql = $sth->fetch(\PDO::FETCH_ASSOC);

        if(!isset($result_sql["id"]) or !($result_sql["id"] >= 1)) {
            $this->e404($h);
            return $h;
        }   

        $class = $result_sql["class"];
        $funct = $result_sql["funct"];
        $result = new $class;
        $h = $result->$funct($h);
           
        return $h;
    }

    public function redirect300($h){
        if($h["error"]["url_dont_have_slash"]){
            $url = $h['url']['d_line'];
            if(isset($h["url"]["get_in_line"]) and $h["url"]["d_of_get_line"] != ""){
                echo 1;
                $url = $url."?".$h["url"]["d_of_get_line"];
            }
            header("Location: ".$url);
            die();
        }
        return $h;
    }

    public function e404($h){
        http_response_code(404);
        $e404 = new \Mod\Core\Controller\Errors;
        $e404->e404($h);
    }
   
}