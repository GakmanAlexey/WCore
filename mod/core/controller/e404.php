<?php

namespace Mod\Core\Controller;

Class E404 extends \Mod\Abstract\Controller{
    public function index($h){

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/e404.php";
        $h = $this->show($h,"errors");
        return $h;
    }

}
