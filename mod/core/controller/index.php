<?php

namespace Mod\Core\Controller;

Class Index extends \Mod\Abstract\Controller{
    public function index($h){

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/index.php";
        $h = $this->show($h);
        return $h;
    }

}
