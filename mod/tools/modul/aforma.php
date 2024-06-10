<?php

namespace Mod\Tools\Modul;

Class Aforma{
    public $method="";
    public $action="";
    public $class="";
    public $id="";

    public $input = [];
    public $button = [];
    public $custom = " ";
    public $html = " ";
    public $build = "";

    public $block_2_active = false;
    public $block_2_html = [];
    public $block_2_name1 = [];
    public $block_2_name2 = [];
    public $block_2_val1 = [];
    public $block_2_val2 = [];

    public function init($h, $method, $action, $class, $id){
        $this->method = $method;
        $this->action = $action;
        $this->class = $class;
        $this->id = $id;

        return $h;
    }
    /**
     * type - input, textarea, selecter, radio,
     */
    public function add_element($h, $type, $name,){
        switch ($i) {
            case "input":                
                $h = $this->add_input($h);
                break;
            case "textarea":
                $h = $this->add_textarea($h);
                break;
            case "selecter":
                $h = $this->add_selecter($h);
                break;
            case "radio":
                $h = $this->add_radio($h);
                break;
            case "checkbox":
                $h = $this->add_checkbox($h);
                break;
            case "emp":
                $h = $this->add_emp($h);
                break;
            case "text":
                $h = $this->add_text($h);
                break;
            case "button":
                $h = $this->add_button($h);
                break;
            case "html":
                $h = $this->add_html($h);
                break;
        }
        return $h;
    }
}
