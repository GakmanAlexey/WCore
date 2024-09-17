<?php

namespace Mod\Tools\Modul;

Class Forma{
    public $method="";
    public $action="";
    public $class="";
    public $id="";

    public $input = [];
    public $pass = [];
    public $button = [];
    public $js = " ";
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

    public function add_pass($h, $name, $type, $class, $placeholder,$id, $value){
        $array = [
            "name" => $name,
            "type" => $type,
            "class" => $class,
            "placeholder" => $placeholder,
            "id" => $id,
            "value" => $value
        ];
        $this->pass[] = $array;

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
        $this->custom .= $text;

        return $h;
    }

    public function add_html($h, $text){
        $this->html .= $text;

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

        foreach($this->pass as $item){
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
            $this->build  .= '
                            <div class="password_parent">
                                '.$input.'
                                <a id="show_'.$item["id"].'" class="password_control view"></a>                     
                            </div>
                            ';
             $this->js .="
             $('#show_".$item["id"]."').click(function(){
                            document.getElementById( 'show_".$item["id"]."' ).classList.toggle('view');
                            var type = $(document.getElementById( '".$item["id"]."' )).attr('type');
                            if(type == \"text\") {
                                document.getElementById('".$item["id"]."').type = 'password';
                            }else{
                                document.getElementById('".$item["id"]."').type = 'text';
                            }
                        });
                        ";
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

    public function add_block_2($h,$html,$name1,$val1_def,$name2,$val2_def){
        $this->block_2_active = true;
        $this->block_2_html[] = $html;
        $this->block_2_name1[] = $name1;
        $this->block_2_name2[] =  $name2;
        $this->block_2_val1[] =  $val1_def;
        $this->block_2_val2[] =  $val2_def;
        return $h;
    }
    public function completion_block_2($h){
        if(!isset($h["url"]["post"])) return $h;
            foreach($h["url"]["post"] as $key => $value){
                $y = 0;
                foreach($this->block_2_name1 as $el_html){
                    if($key == $el_html){
                        $this->block_2_val1[$y] = $value;
                    }
                    $y++;
                }
                $y = 0;
                foreach($this->block_2_name2 as $el_html){
                    if($key == $el_html){
                        $this->block_2_val2[$y] = $value;
                    }
                    $y++;
                }
                
            }
        return $h;
    }

    public function build_block_2($h){
        $x = 0;
        foreach($this->block_2_html as $el){
            $this->block_2_html[$x]= str_replace("%name1%", $this->block_2_name1[$x], $this->block_2_html[$x]);
            $this->block_2_html[$x]= str_replace("%name2%", $this->block_2_name2[$x], $this->block_2_html[$x]);
            $this->block_2_html[$x]= str_replace("%val1%", $this->block_2_val1[$x], $this->block_2_html[$x]);
            $this->block_2_html[$x]= str_replace("%val2%", $this->block_2_val2[$x], $this->block_2_html[$x]);
            $this->custom .= $this->block_2_html[$x];
            $x++;
        }
        return $h;
    }
}
