<?php

namespace Mod\Mail\Modul;

Class Mail{
    public function send($h,$to,$name_to,$sub,$body){
        $h["mail"] = [];
        $h["mail"]["cfg"] = new \Mod\Mail\Modul\Config;
        $h["mail"]["pmail"] = new \Mod\Mail\Modul\Pmail;
        $h = $this->config($h);
        $h["mail"]["pmail"]->setFrom($h["mail"]["cfg"]->login, $h["mail"]["cfg"]->name_from);	
        $h["mail"]["pmail"]->addAddress($to);	
        $h["mail"]["pmail"]->Subject = $sub;
        $h["mail"]["pmail"]->msgHTML($body);
        $h["mail"]["pmail"]->send();
        return $h;

    }
    public function config($h){
        $h["mail"]["pmail"]->CharSet = $h["mail"]["cfg"]->encoding;
        $h["mail"]["pmail"]->isSMTP();
        $h["mail"]["pmail"]->SMTPAuth = true;
        $h["mail"]["pmail"]->SMTPDebug = 0;
        $h["mail"]["pmail"]->Host = $h["mail"]["cfg"]->host;
        $h["mail"]["pmail"]->Port = $h["mail"]["cfg"]->port;
        $h["mail"]["pmail"]->Username = $h["mail"]["cfg"]->login;
        $h["mail"]["pmail"]->Password = $h["mail"]["cfg"]->password;
        return $h;
    }

}
