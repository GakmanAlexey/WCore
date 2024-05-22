<?php

namespace Mod\Tools\Modul;

Class Forma{
    public $method="";
    public $action="";
    public $class="";
    public $id="";

    public $input = [];
    public $button = [];
    public $custom = " ";
    public $html = " ";
    public $build = "";

    public function init($h, $method, $action, $class, $id){
        $this->method = $method;
        $this->action = $action;
        $this->class = $class;
        $this->id = $id;

        return $h;
    }

    public function add_input($h, $name, $type, $class, $placeholder,$id, $value){
        $array = [
            "name" => $name,
            "type" => $type,
            "class" => $class,
            "placeholder" => $placeholder,
            "id" => $id,
            "value" => $value
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
    public function custom($h, $text){
        $this->custom = $text;

        return $h;
    }

    public function add_html($h, $text){
        $this->html = $text;

        return $h;
    }
    public function buils($h){
        $this->build = "";
        $this->buils_head($h);
        $this->buils_input($h);
        $this->build .= $this->custom;
        $this->buils_button($h);
        $this->build .= $this->html;
        $this->build .= "
        </form>";
        return $h;
    }

    public function buils_head($h){

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

        $this->build  = $build; 
        return $h;
    }

    public function buils_input($h){
        foreach($this->input as $item){
            $input = "<input ";
            if($item["name"] != ""){
                $input .= 'name="'.$item["name"].'" ';
            }
            if($item["type"] != ""){
                $input .= 'type="'.$item["type"].'" ';
            }
            if($item["class"] != ""){
                $input .= 'class="'.$item["class"].'" ';
            }
            if($item["placeholder"] != ""){
                $input .= 'placeholder="'.$item["placeholder"].'" ';
            }
            if($item["id"] != ""){
                $input .= 'id="'.$item["id"].'" ';
            }
            if($item["value"] != ""){
                $input .= 'value="'.$item["value"].'" ';
            }
            $input .= " />";
            $this->build  .= "
            "; 
            $this->build  .= $input;
        }        

        return $h;
    }



    public function buils_button($h){
        foreach($this->button as $item){
            $button = "<button ";
            if($item["name"] != ""){
                $button .= 'name="'.$item["name"].'" ';
            }
            if($item["class"] != ""){
                $button .= 'class="'.$item["class"].'" ';
            }
            if($item["id"] != ""){
                $button .= 'id="'.$item["id"].'" ';
            }
            if($item["value"] != ""){
                $button .= 'value="'.$item["value"].'" ';
            }
            $button .= ">";
            if($item["text"] != ""){
                $button .= " ".$item["text"]." ";
            }
            $this->build  .= "
            "; 
            $this->build  .= $button;
            $this->build  .= "</button>";
        }        

        return $h;
    }
    public function completion($h){
        if(!isset($h["url"]["post"])) return $h;
        $x = 0;
        foreach($this->input as $a){
            foreach($this->input[$x] as $item =>$item_value){
                foreach($h["url"]["post"] as $key => $value){
                    //echo '$item =>'.$item.'$item_value =>'.$item_value.'$key =>'.$key.'$value =>'.$value."<br>";
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
}
