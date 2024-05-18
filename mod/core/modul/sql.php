<?php

namespace Mod\Core\Modul;

Class Sql extends \PDO{
    public $db_connect;

    public function __construct(){
        $cfg =  new \Mod\Core\Modul\Config;
        $this->db_connect = new \PDO('mysql:host='.$cfg->host.':'.$cfg->port.';dbname='.$cfg->detabase, $cfg->login, $cfg->pass);
        return new \PDO('mysql:host='.$cfg->host.':'.$cfg->port.';dbname='.$cfg->detabase, $cfg->login, $cfg->pass);
    }
}