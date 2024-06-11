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
        $list_select = [],
        $text = ""
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
                $h = $this->add_radio($h,$name, $class, $id, $target, $list_select);
                break;
            case "checkbox":
                $h = $this->add_checkbox($h,$name, $class, $id, $target, $list_select);
                break;
            case "emp":
                $h = $this->add_emp($h);
                break;
            case "text":
                $h = $this->add_text($h,$text);
                break;
            case "button":
                $h = $this->add_button($h, $name, $class, $id, $value, $text);
                break;
            case "html":
                $h = $this->add_html($h, $html);
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
    public function add_radio($h,$name, $class, $id, $target, $list_select){
        $array = [
            "el_type" => "radio",
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
    public function add_checkbox($h,$name, $class, $id,  $target, $list_select){
        $array = [
            "el_type" => "checkbox",
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
    
    public function add_emp($h){
        $array = [
            "el_type" => "emp"
        ];
        $this->input[] = $array;
        return $h;

    }


    public function add_text($h,$text){
        $array = [
            "el_type" => "text",
            "text" => $text
        ];
        $this->input[] = $array;
        return $h;

    }



    public function add_button($h, $name, $class, $id, $value, $text){
        $array = [
            "name" => $name,
            "class" => $class,
            "id" => $id,
            "value" => $value,
            "text" => $text
        ];
        $this->button[] = $array;

        return $h;
    }

    public function add_html($h,$html){
        $array = [
            "el_type" => "html",
            "text" => $html
        ];
        $this->input[] = $array;
        return $h;

    }

    public function build($h){
        $h = $this->build_head($h);
        $h = $this->completion($h);
        foreach($this->input as $item){
            //var_dump( $item);
            switch ($item["el_type"]) {
                case "input":              
                    $h = $this->build_input($h,$item);
                    break;
                case "textarea":
                    $h = $this->build_textarea($h,$item);
                    break;
                case "selecter":
                    $h = $this->build_selecter($h,$item);
                    break;
                case "radio":
                    $h = $this->build_radio($h,$item);
                    break;
                case "checkbox":
                    $h = $this->build_checkbox($h,$item);
                    break;
                case "emp":
                    $h = $this->build_emp($h,$item);
                    break;
                case "text":
                    $h = $this->build_text($h,$item);
                    break;
                case "button":
                    $h = $this->build_button($h,$item);
                    break;
                case "html":
                    $h = $this->build_html($h,$item);
                    break;
            }  
        }
        $h = $this->build_end($h);
        return $h;
    }

    public function completion($h){
        if(!isset($h["url"]["post"])) return $h;
        $x = 0;
        foreach($this->input as $a){
            foreach($this->input[$x] as $item =>$item_value){
                foreach($h["url"]["post"] as $key => $value){
                    if($item == "name"){
                        if($item_value == $key ){
                            $this->input[$x]["value"] = $value;
                        }
                    }
                }
            }
            $x++;
        }
        return $h;
    }

    public function build_input ($h,$item){
        $build = '<div class="parent_inp parent_inp_50_procent">';
        $build .='<input ';
        if(isset($item["class"]) and $item["class"] != ""){
            $build .= ' class="'.$item["class"].'" '; 
        }
        if(isset($item["type"]) and $item["type"] != ""){
            $build .= ' type="'.$item["type"].'" '; 
        }
        if(isset($item["name"]) and $item["name"] != ""){
            $build .= ' name="'.$item["name"].'" '; 
        }
        if(isset($item["placeholder"]) and $item["placeholder"] != ""){
            $build .= ' placeholder="'.$item["placeholder"].'" '; 
        }
        if(isset($item["id"]) and $item["id"] != ""){
            $build .= ' id="'.$item["id"].'"'; 
        }
        if(isset($item["value"]) and $item["value"] != ""){
            $build .= ' value="'.$item["value"].'" '; 
        }
        if(isset($item["label"]) and $item["label"] != ""){
            $build .= ' <label class="parent_inp_label" for="'.$item["name"].'">'.$item["label"].'</label>'; 
        }
        $build .= '</div> ';

        $this->build  .= $build;
        return $h;
    }
    public function build_textarea ($h,$item){
        $build = '<div class="parent_inp parent_inp_50_procent_textarea">';
        $build .='<textarea ';
        if(isset($item["class"]) and $item["class"] != ""){
            $build .= ' class="'.$item["class"].'" '; 
        }
        if(isset($item["type"]) and $item["type"] != ""){
            $build .= ' type="'.$item["type"].'" '; 
        }
        if(isset($item["name"]) and $item["name"] != ""){
            $build .= ' name="'.$item["name"].'" '; 
        }
        if(isset($item["placeholder"]) and $item["placeholder"] != ""){
            $build .= ' placeholder="'.$item["placeholder"].'" '; 
        }
        if(isset($item["id"]) and $item["id"] != ""){
            $build .= ' id="'.$item["id"].'"'; 
        }
        $build .= 'cols="30" rows="10" >';


        if(isset($item["value"]) and $item["value"] != ""){
            $build .= ''.$item["value"].'</textarea>'; 
        }

        if(isset($item["label"]) and $item["label"] != ""){
            $build .= ' <label class="parent_inp_label" for="'.$item["name"].'">'.$item["label"].'</label>'; 
        }

        $build .= '</div> ';

        $this->build  .= $build;
        return $h;
    }
    public function build_selecter ($h,$item){

        $build = '<div class="parent_inp parent_inp_50_procent">';

        $build .='<select ';
        if(isset($item["class"]) and $item["class"] != ""){
            $build .= ' class="'.$item["class"].'" '; 
        }
        if(isset($item["name"]) and $item["name"] != ""){
            $build .= ' name="'.$item["name"].'" '; 
        }
        if(isset($item["id"]) and $item["id"] != ""){
            $build .= ' id="'.$item["id"].'"'; 
        }
        foreach($list_select as  $key => $val){
            if($key == $target){
                $foc = " selected ";
            }else{
                $foc = "";
            }
            $build .= '<option value="'.$key.'" '.$foc.' >'.$val.'</option>';
        }
        $build .= '</select> ';
        if(isset($item["label"]) and $item["label"] != ""){
            $build .= ' <label class="parent_inp_label" for="'.$item["name"].'">'.$item["label"].'</label>'; 
        }
        $build .= '</div> ';

        $this->build  .= $build;
        return $h;
    }
    public function build_radio ($h,$item){

        $build = '<div class="flag flag_50_procent">';
        
        foreach($list_select as  $key => $val){
            if($key == $target){
                $foc = " checked ";
            }else{
                $foc = "";
            }
            $build .= '
                <div class="flag_element">
                    <input type="radio" id="'.$item["id"].'" name="'.$item["name"].'" value="'.$key.'" '.$foc.' />
                    <label for="'.$item["name"].'">'.$val.'</label>
                </div>
                ';
        }
        $build .= '</div> ';
        $this->build  .= $build;
        return $h;
    }
    public function build_checkbox ($h,$item){

        $build = '<div class="flag flag_50_procent">';
        
        foreach($list_select as  $key => $val){
            if($key == $target){
                $foc = " checked ";
            }else{
                $foc = "";
            }
            $build .= '
                <div class="flag_element">
                    <input type="checkbox" id="'.$item["id"].'" name="'.$item["name"].'" value="'.$key.'" '.$foc.' />
                    <label for="'.$item["name"].'">'.$val.'</label>
                </div>
                ';
        }

        $build .= '</div> ';
        $this->build  .= $build;
        return $h;
    }
    public function build_emp ($h,$item){
        $build = '<div class="free_space"></div>';
        $this->build  .= $build;
        return $h;
    }
    public function build_text ($h,$item){
        return $h;
    }
    public function build_button ($h,$item){
        return $h;
    }
    public function build_html ($h,$item){
        return $h;
    }
    public function build_head($h){        
        $build = "<form ";
        if($this->method != ""){
            $build .= 'method="'.$this->method .'" ';
        }
        if($this->action != ""){
            $build .= 'action="'.$this->action .'" ';
        }
        if($this->class != ""){
            $build .= 'class="'.$this->class .'" ';
        }
        if($this->id != ""){
            $build .= 'id="'.$this->id .'" ';
        }
        $build .= " >";

        $this->build  .= $build;
        return $h;
    }

    public function build_end($h){
        $this->build .= '</form>';
        return $h;
    }

    public function render($h){
        echo $this->build;
        return $h;
    }
}
