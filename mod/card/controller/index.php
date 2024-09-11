<?php

namespace Mod\Card\Controller;

Class Index extends \Mod\Abs\Controller{

    public function show_card($h){        
        
            $card = new \Mod\Card\Modul\Card;
            $h = $card ->index($h);

            echo $h["card"]["show_caont"];

        return $h;
    }

    public function add_to_card($h){

        
        $card = new \Mod\Card\Modul\Card;
        $h = $card ->add_to_card($h);


        return $h;
    }

}
