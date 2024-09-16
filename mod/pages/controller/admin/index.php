<?php

namespace Mod\Pages\Controller\Admin;

Class Index extends \Mod\Abs\Controller{
    public function index($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "admin";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show );

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/admin/index.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

    public function onas($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/onas.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

    public function contacts($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/contacts2.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

    public function sogl($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/sogl.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }


    public function polit($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/polit.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }



    public function nastroiki($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/nastr.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }

    public function vozrat($h){
        $h = $this->cashe_start($h);
        if($h["cache"]["isset"]) return $h;
        $this->type_show = "default";
        $cfg = new \Mod\Pages\Modul\Cfg;
        $h = $cfg->take_head($h,$this->type_show);

        $h["view"]["lists"][] = MYPOS."/mod/pages/view/vozrat.php";
        $h = $this->show($h);
        $h = $this->cashe_end($h);

        return $h;
    }




}
