<?php

namespace Mod\Pages\Modul;

Class Cfg{
    
    public $type_show;

    public function take_head($h,$param){
        $this->type_show = $param;
        $h = $this->load_default_config($h);
        $h = $this->load_sql_conf($h);
        $h = $this->build_css($h);
        $h = $this->build_head($h);
        return $h;
    }

    public function load_default_config($h){
        $h["head"] = [];
        $h["head"]["default_config"] = new \Mod\Pages\Modul\Config;
        return $h;
    }

    public function load_sql_conf($h){
        $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `heads` WHERE `url` = ? LIMIT 1");
        $sth1->execute(array($h["url"]["d_line"]));
        $h["head"]["sql_config"] = $sth1->fetch(\PDO::FETCH_ASSOC);
        return $h;
    }

    public function build_css($h){switch ($this->type_show ) {
        case "default":
            $h["head"]["css"] = $h["head"]["default_config"]->сss_list["delault"];
            break;
        case "empty":
            $h["head"]["css"] = $h["head"]["default_config"]->сss_list["empty"];
            break;
        case "admin":
            $h["head"]["css"] = $h["head"]["default_config"]->сss_list["admin"];
            break;
        case "ajax":
            $h["head"]["css"] = $h["head"]["default_config"]->сss_list["ajax"];
            break;
        case "api":
            $h["head"]["css"] = $h["head"]["default_config"]->сss_list["api"];
            break;
        case "errors":
            $h["head"]["css"] = $h["head"]["default_config"]->сss_list["errors"];
            break;
    }

        return $h;
    }
    public function build_head($h){
        if(isset($h["head"]["sql_config"]["title_q"])){
            $h["head"]["title"] = $h["head"]["default_config"]->pre_title.$h["head"]["default_config"]->title.$h["head"]["default_config"]->post_title;
        }else{
            $h["head"]["title"] = $h["head"]["default_config"]->pre_title.$h["head"]["sql_config"]["title_q"].$h["head"]["default_config"]->post_title;
        }

        if(isset($h["head"]["sql_config"]["description_q"])){
            $h["head"]["description"] = $h["head"]["default_config"]->pre_description.$h["head"]["default_config"]->description.$h["head"]["default_config"]->post_description;
        }else{
            $h["head"]["description"] = $h["head"]["default_config"]->pre_description.$h["head"]["sql_config"]["description_q"].$h["head"]["default_config"]->post_description;
        }

        if(isset($h["head"]["sql_config"]["keys_q"])){
            $h["head"]["key"] = $h["head"]["default_config"]->pre_keys.$h["head"]["default_config"]->keys.$h["head"]["default_config"]->post_keys;
        }else{
            $h["head"]["key"] = $h["head"]["default_config"]->pre_keys.$h["head"]["sql_config"]["keys_q"].$h["head"]["default_config"]->post_keys;
        }

        $h["head"]["formanico"] = $h["head"]["default_config"]->formanico;
        $h["head"]["ico"] = $h["head"]["default_config"]->ico;
        $h["head"]["generator"] = $h["head"]["default_config"]->generator;
        $h["head"]["themeColor"] = $h["head"]["default_config"]->themeColor;

        return $h;
    }
    
}
