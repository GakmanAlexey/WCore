<?php

namespace Mod\Core\Controller;

Class Index extends \Mod\Abstract\Controller{
    public function index($h){
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/index.php";
        $h = $this->show($h);
        return $h;
    }

}
