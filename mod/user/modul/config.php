<?php

namespace Mod\User\Modul;

Class Config{
    //shead
    public $login_min  = 4;
    public $login_max  = 20;
    public $pass_min  = 8;
    public $pass_max  = 64;

    public $login_min_msg  = 4;
    public $login_max_msg  = 20;
    public $pass_min_msg  = 8;
    public $pass_max_msg  = 64;



    public $congig = [];

    public function __construct(){
        
    }
}
