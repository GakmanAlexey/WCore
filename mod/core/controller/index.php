<?php

namespace Mod\Core\Controller;

Class Index extends \Mod\Abs\Controller{
        public function index($h){
            $shp = new \Mod\Shop\Controller\Index;
            $h = $shp  -> index($h);
            return $h;
        }

}
