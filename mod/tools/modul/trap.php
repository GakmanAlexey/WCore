<?php

namespace Mod\Tools\Modul;

Class Trap{

    /*
    $trap = new \Mod\Tools\Modul\Trap;
    $h = trap->start($h);
    */
    public function start($h){
        $h["cookie"]["trap"] = [];
        //проверить есть ли ловушка
        $h = $this->cheak_user($h);
        //создать если ее нет
        if(!$h["cookie"]["trap"]["active"]){
            $h = $this-> create_trap($h);
        }
        //следить за юзером
        if (!isset($_COOKIE["trace"])){
            //setcookie('trace', '', time() - 3600);
            header('Location: '.$_SERVER['REQUEST_URI']);
        }
        $h["cookie"]["trap"]["hex"] = $_COOKIE["trace"];
        return $h;
    }

    public function cheak_user($h){
        if (isset($_COOKIE["trace"])){
            $h["cookie"]["trap"]["active"] = true;
        }else{
            $h["cookie"]["trap"]["active"] = false;
        }

        return $h;
    }

    public function create_trap($h){
        $hex = new \Mod\Tools\Modul\Hex;
        //$h["cookie"]["trap"]["hex"] = $hex->create(40,5);
        if(!isset($_SESSION["id"])){
            $_SESSION["id"] = $hex->create(40,5);
        }
        setcookie('trace',$_SESSION["id"], strtotime('+30 days'));


        return $h;
    }


}
