<?php

namespace Mod\Tools\Modul;

Class Hex{

    /*
    Типы создания
    1       0-9
    2       a-z
    3       A-Z
    4       !-|
    5       0,a,Z
    6       0,a,A,!

    */

    public  $nubc = [];
    public  $abc = [];
    public  $ABC = [];
    public  $simbol = [];
    
    public  $nubc_size = 0;
    public  $abc_size = 0;
    public  $ABC_size = 0;
    public  $simbol_size = 0;

    public  $abc_join = [];
    public  $adc_join_size = 0;

    public function __construct(){
        $this->nubc = array("0","1","2","3","4","5","6","7","8","9");
        $this->abc = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $this->ABC = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        $this->simbol = array("!","@","#","$","%","^","&","*","(",")","_","+","№",";",":","?","/","-","+","=",",","[","]","{","}","|");

        $this->nubc_size = 10;
        $this->abc_size = 26;
        $this->ABC_size = 26;
        $this->simbol_size = 26;
    }
    public function create($long,$type = 1){
        $this->create_abc_join($type);
        $result = $this->generator($long);
        return $result;
        
    }

    public function create_abc_join($type){
        if($type == 1){
            $this->abc_join = array_merge($this->abc_join, $this->nubc);
            $this->adc_join_size = $this->nubc_size;
        }else if($type == 2){
            $this->abc_join = array_merge($this->abc_join, $this->abc);
            $this->adc_join_size = $this->abc_size;
        }else if($type == 3){
            $this->abc_join = array_merge($this->abc_join, $this->ABC);
            $this->adc_join_size = $this->ABC_size;
        }else if($type == 4){
            $this->abc_join = array_merge($this->abc_join, $this->simbol);
            $this->adc_join_size = $this->simbol_size;
        }else if($type == 5){
            $this->abc_join = array_merge($this->abc_join, $this->nubc);
            $this->abc_join = array_merge($this->abc_join, $this->abc);
            $this->abc_join = array_merge($this->abc_join, $this->ABC);
            $this->adc_join_size = $this->nubc_size + $this->abc_size + $this->ABC_size;
        }else if($type == 6){
            $this->abc_join = array_merge($this->abc_join, $this->nubc);
            $this->abc_join = array_merge($this->abc_join, $this->abc);
            $this->abc_join = array_merge($this->abc_join, $this->ABC);
            $this->abc_join = array_merge($this->abc_join, $this->simbol);
            $this->adc_join_size = $this->nubc_size + $this->abc_size + $this->ABC_size + $this->simbol_size ;
        }else {
            $this->abc_join = array_merge($this->abc_join, $this->nubc);
            $this->abc_join = array_merge($this->abc_join, $this->abc);
            $this->abc_join = array_merge($this->abc_join, $this->ABC);
            $this->abc_join = array_merge($this->abc_join, $this->simbol);
            $this->adc_join_size = $this->nubc_size + $this->abc_size + $this->ABC_size + $this->simbol_size ;
        }
    }

    public function generator($size){
        $i = 0;
        $word = "";
        //var_dump("<pre>",$this->abc_join);
        while($i < $size){
            $nums = random_int(0,$this->adc_join_size-1);
            //echo $nums;
            $word .= $this->abc_join[$nums];
            $i ++;
        }
        return $word;
    }

}
