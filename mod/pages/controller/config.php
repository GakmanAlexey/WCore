<?php

namespace Mod\Pages\Modul;

Class Config{
    //shead
    public $pre_title   = "Пре";
    public $title       = "Тайтл по умолчанию";
    public $post_title  = "Пост";

    public $pre_description   = "Пре";
    public $description       = "Тайтл по умолчанию";
    public $post_description  = "Пост";

    public $pre_keys    = "Пре";
    public $keys        = "Тайтл по умолчанию";
    public $post_keys   = "Пост";

    public $formanico = "";
    public $ico = "";
    public $generator = "";
    public $themeColor = "";

    public $ss_list = [];

    public function __construct($h){

        return $h;
    }
}
