<?php

namespace Mod\Mail\Install;

Class Mail extends \Mod\Abs\Install{

    public function install_BD($h){
        return $h;
    }

    public function install_Router($h){
        
        return $h;
    }

    public function install_Congif($h){
            $file_name = MYPOS.SLASH."mod".SLASH."mail".SLASH."modul".SLASH."config.php";
            $file_text = 
'<?php

namespace Mod\Mail\Modul;

Class Config{
    public $host = "ssl://smtp.yandex.ru";
    public $port = 465;
    public $login = "************";
    public $password = "***************";
    public $encoding = "UTF-8";
    public $name_from = "Сайт тест";

}
';
            $h["install"]["build_adress"] = $file_name;
            $h["install"]["build_text"] = $file_text;
            $this->build_config($h);
        return $h;
    }
    
}