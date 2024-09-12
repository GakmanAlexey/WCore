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

    public function show_full_card($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);
        $card = new \Mod\Card\Modul\Card;
        $h = $card ->list_full($h);

        $h["view"]["lists"][] = MYPOS."/mod/card/view/main.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

    public function operation($h){
        $card = new \Mod\Card\Modul\Card;
        $h = $card ->operation($h);


        return $h;
    }

}
