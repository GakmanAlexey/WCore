<?php

namespace Mod\Tools\Modul;

Class Cache{
        /*
        $cache = new \Mod\Tools\Modul\Cache;
        $cache ->clear($h);
        */
    public function clear($h){
        $dir = MYPOS.SLASH.'cache'.SLASH;
        if ($objs = glob($dir . '/*')) {
            foreach($objs as $obj) {
                is_dir($obj) ? clear_dir($obj, true) : unlink($obj);
            }
        }

        return $h;
    }
    

}
