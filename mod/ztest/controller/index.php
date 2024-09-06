<?php

namespace Mod\Ztest\Controller;

Class Index extends \Mod\Abs\Controller{

    public function test($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $h["view"]["lists"][] = MYPOS."/mod/ztest/view/test.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

}
