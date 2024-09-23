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
        $h = $card ->take_full_list($h);

        $Lc = new \Mod\Lc\Modul\Lc;
        $h = $Lc ->show_balance($h);
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

    public function res_by($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);
        $card = new \Mod\Card\Modul\By;
        $h = $card->index($h);

        $h["view"]["lists"][] = MYPOS."/mod/card/view/by.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

    }


}
