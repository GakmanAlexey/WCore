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

    public $сss_list = [];

    public function __construct(){
        $this->сss_list["delault"] = [
            "\src\css\style.css",
            "\src\css\mobile.css"
        ];
        $this->сss_list["empty"] = [""];
        $this->сss_list["admin"] = [
            "\src\admin\style-crm.css"
        ];
        $this->сss_list["ajax"] = [""];
        $this->сss_list["api"] = [""];
        $this->сss_list["errors"] = [
            "\src\css\style.css",
            "\src\css\mobile.css"
        ];
    }

}
