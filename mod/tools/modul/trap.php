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
                setcookie('trace',$_SESSION["trace"],"/", strtotime('+30 days'));
                //header('Location: '.$_SERVER['REQUEST_URI']);
            }else{
                $hex = new \Mod\Tools\Modul\Hex;
                $_SESSION["trace"] = $hex->create(40,5);
                setcookie('trace',$_SESSION["trace"],"/", strtotime('+30 days'));
                //header('Location: '.$_SERVER['REQUEST_URI']);
            }
        }  
        $h["cookie"]["trap"] = $_SESSION["trace"];
/*
        echo $h["cookie"]["trap"]."<br>";
        echo $_COOKIE["trace"]."<br>";
        echo $_SESSION["trace"]."<br>";*/
        return $h;
    }

    


}
