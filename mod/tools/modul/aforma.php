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
    public function add_element(
        $h, 
        $type_el = "input", 
        $name = "noname", 
        $type = "text", 
        $class = "", 
        $placeholder = "",
        $id = "", 
        $value =  null, 
        $label = "Стандартное поле",
        $target = "", 
        $list_select = []
    ){
        switch ($type_el) {
            case "input":                
                $h = $this->add_input($h, $name, $type, $class, $placeholder,$id, $value, $label);
                break;
            case "textarea":
                $h = $this->add_textarea($h,$name, $class, $placeholder, $id, $value, $label);
                break;
            case "selecter":
                $h = $this->add_selecter($h,$name, $class, $id, $label, $target, $list_select);
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

    public function add_input($h, $name, $type, $class, $placeholder, $id, $value, $label){
        $array = [
            "el_type" => "input",
            "name" => $name,
            "type" => $type,
            "class" => $class,
            "placeholder" => $placeholder,
            "id" => $id,
            "value" => $value,
            "label" => $label
        ];
        $this->input[] = $array;
        return $h;
    }

    public function add_textarea($h,$name, $class, $placeholder, $id, $value, $label){
        $array = [
            "el_type" => "textarea",
            "name" => $name,
            "class" => $class,
            "placeholder" => $placeholder,
            "id" => $id,
            "value" => $value,
            "label" => $label
        ];
        $this->input[] = $array;
        return $h;
    }

    public function add_selecter($h,$name, $class, $id, $label, $target, $list_select){
        $array = [
            "el_type" => "selecter",
            "name" => $name,
            "class" => $class,
            "id" => $id,
            "target" => $target,
            "label" => $label,
            "list_select" => $list_select
        ];
        $this->input[] = $array;
        return $h;

    }
}
