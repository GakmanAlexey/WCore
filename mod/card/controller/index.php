<?php

namespace Mod\Card\Controller;

Class Index extends \Mod\Abs\Controller{

    public function show_card($h){
        
        echo 11;

        return $h;
    }

    public function show_cat($h){

        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $sh = new \Mod\Shop\Modul\Shop;
        $h = $sh ->cat($h);
        $h["view"]["lists"][] = MYPOS."/mod/shop/view/cat.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);


        return $h;
    }

    public function item($h){

        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $sh = new \Mod\Shop\Modul\Shop;
        $h = $sh ->item($h);
        $h["view"]["lists"][] = MYPOS."/mod/shop/view/item.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);


        return $h;
    }

}
