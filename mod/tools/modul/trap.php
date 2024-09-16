<?php

namespace Mod\Tools\Modul;

Class Trap{

    /*
    $trap = new \Mod\Tools\Modul\Trap;
    $h = trap->start($h);
    */
    public function start($h){
        $h["cookie"]["trap"] = [];

        if(isset($_COOKIE["trace"])){
            $_SESSION["trace"] = $_COOKIE["trace"];
        }else{
            if(isset($_SESSION["trace"])){
                setcookie('trace',$_SESSION["trace"], strtotime('+30 days'));
                header('Location: '.$_SERVER['REQUEST_URI']);
            }else{
                $_SESSION["trace"] = $hex->create(40,5);
                setcookie('trace',$_SESSION["trace"], strtotime('+30 days'));
                header('Location: '.$_SERVER['REQUEST_URI']);
            }
        }



        
        return $h;
    }

    


}
