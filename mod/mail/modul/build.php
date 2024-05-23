<?php

namespace Mod\Mail\Modul;

Class Build{
    /*
    $m_b = new \Mod\Mail\Modul\Build;
    $h["mail_builder"]["head_img"] = "";
    $h["mail_builder"]["head"] = "";
    $h["mail_builder"]["text"] = "";
    $text_mail_to_send = m_b->standart($h);
    */
    public function standart($h){
        $path = MYPOS.SLASH."mod".SLASH."mail".SLASH."view";
        $main = "";
        $main .=file_get_contents($path.SLASH. 'header.php');
        $main .=file_get_contents($path.SLASH. 'body.php');
        $main .=file_get_contents($path.SLASH. 'footer.php');
        $main = str_replace("%head_img%", $h["mail_builder"]["head_img"], $main);
        $main = str_replace("%head%", $h["mail_builder"]["head"], $main);
        $main = str_replace("%text%", $h["mail_builder"]["text"], $main);

        return $main;

        
    }
    

}
