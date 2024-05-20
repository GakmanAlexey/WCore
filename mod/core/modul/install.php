<?php

namespace Mod\Core\Modul;

Class Install {

    public function __construct($h){
        
        $h["install"]["dir_list"] = scandir(MYPOS.SLASH."mod");
        array_splice($h["install"]["dir_list"] , 0 ,  2);

        $h["install"]["error"]  = [];
        $h["install"]["msg"]  = [];
        $h = $this->seach_files($h);
        return $h;
    }


    public function seach_files($h){
        $stadiya = 0;
        while($stadiya < 2){
            foreach($h["install"]["dir_list"] as $mod_dir){
                $dir_list = scandir(MYPOS.SLASH."mod".SLASH.$mod_dir);
                array_splice($dir_list , 0 ,  2);            
                foreach($dir_list as $mod_dir_dir){
                    if($mod_dir_dir  == "install"){
                        $file_list = scandir(MYPOS.SLASH."mod".SLASH.$mod_dir.SLASH.$mod_dir_dir);
                        array_splice($file_list , 0 ,  2);

                        foreach($file_list as $item_install){
                            $h["install"]["table"] = [];
                            $class_file = $pieces = explode(".", $item_install);
                            $class = ucfirst($class_file[0]); 
                            $class = '\\'."Mod".'\\'.ucfirst($mod_dir).'\\'.ucfirst($mod_dir_dir).'\\'.$class;

                            $result = new $class;

                            if($stadiya == 0){
                                $funct1  = "install_BD";
                                $h = $result->$funct1($h);
                                $h = $this->install_table($h,$class);
                            }

                            if($stadiya == 1){
                            $funct2  = "install_router";
                            $h = $result->$funct2($h);                        
                            $h = $this->install_router($h);
                            }

                            $h["install"]["table"] = [];
                        }     
                    }
                }
            }
            $stadiya++;
        }

        echo "<br>";
        var_dump("<pre>",$h["install"]["error"],"</pre>");
        echo "<br>";
        var_dump("<pre>",$h["install"]["msg"],"</pre>");
        echo "<br>";
    }


    public function install_table($h,$class){        
        foreach($h["install"]["table"] as $sting_sql){
            $error = 0;
            try {
                $h["sql"]["db_connect"]->db_connect->exec($sting_sql);
            } catch (\PDOException $e) {
                $msg = "";
                $msg = $e->getMessage();
                $error = 1;
            }
            if($error == 1){
                $h["install"]["error"][]  = "Ошибка Класс " . $class . " Возможно уже существует!";
                $h["install"]["msg"] [] ="[ - ] " .$class ." Не установился!";
            }else{
            $h["install"]["msg"] [] ="[ + ] " .$class ." Установлен";
             }                            
        }

        return $h;
    }


    public function install_router($h){        
        foreach($h["install"]["line"] as $sting_sql){
            $sth1 = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `router` WHERE `url` = ? LIMIT 1");
            $sth1->execute(array($sting_sql["url"]));
            $res = $sth1->fetch(\PDO::FETCH_ASSOC);
            if(!isset($res["id"]) ){
                $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `router` (
                    url,
                    class,
                    funct
                    ) VALUES ( ?,?,?)');
                $sth->execute(array(
                    $sting_sql["url"],
                    $sting_sql["class"],
                    $sting_sql["function"]
                ));
                $h["install"]["msg"] [] ="[ + ] " .$sting_sql["url"] ." Установлен!";
            }else{
                $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `router` SET  class = ?, funct = ? WHERE `url` = ? ");
                $sth2->execute(array($sting_sql["class"],$sting_sql["function"],$sting_sql["url"]));
                $h["install"]["msg"] [] ="[ ! ] " .$sting_sql["url"] ." Обнавлен!";
            }


            $sth_head = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `heads` WHERE `url` = ? LIMIT 1");
            $sth_head ->execute(array($sting_sql["url"]));
            $res_head = $sth_head ->fetch(\PDO::FETCH_ASSOC);  
            if(!isset($res_head["id"])){ 
                $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `heads` (
                    url,
                    title_q,
                    description_q,
                    keys_q,
                    name_q
                    ) VALUES ( ?,?,?,?,?)');
                $sth->execute(array(
                    $sting_sql["url"],
                    $sting_sql["title"],
                    $sting_sql["description"],
                    $sting_sql["keys"],
                    $sting_sql["name"]
                ));
                $h["install"]["msg"] [] ="[ + ] " .$sting_sql["url"] ." Установлен  heads";
            }else{
                $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `heads` SET  title_q = ?, description_q = ?, keys_q = ?, name_q = ? WHERE `url` = ? ");
                $sth2->execute(array($sting_sql["title"], $sting_sql["description"], $sting_sql["keys"], $sting_sql["name"], $sting_sql["url"]));
                $h["install"]["msg"] [] ="[ ! ] " .$sting_sql["url"] ." Обнавлен heads!";
            }

            if($sting_sql["add_to_sitemap"]){
                $sth_smap = $h["sql"]["db_connect"]->db_connect->prepare("SELECT * FROM `sitemap` WHERE `url` = ? LIMIT 1");
                $sth_smap ->execute(array($sting_sql["url"]));
                $res_smap = $sth_smap ->fetch(\PDO::FETCH_ASSOC);  

                if(!isset($res_smap["id"])){ 
                    $sth = $h["sql"]["db_connect"]->db_connect->prepare('INSERT INTO `sitemap` (
                        url,
                        lastmod_s,
                        change_s,
                        priority_s
                        ) VALUES ( ?,?,?,?)');
                    $sth->execute(array(
                        $sting_sql["url"],
                        $sting_sql["lastmod_s"],
                        $sting_sql["change_s"],
                        $sting_sql["priority_s"]
                    ));
                    $h["install"]["msg"] [] ="[ + ] " .$sting_sql["url"] ." Установлен  sitemap";

                }else{
                    $sth2 = $h["sql"]["db_connect"]->db_connect->prepare("UPDATE `sitemap` SET  lastmod_s = ?, change_s = ?, priority_s = ? WHERE `url` = ? ");
                    $sth2->execute(array($sting_sql["lastmod_s"], $sting_sql["change_s"], $sting_sql["priority_s"],  $sting_sql["url"]));
                    $h["install"]["msg"] [] ="[ ! ] " .$sting_sql["url"] ." Обнавлен sitemap!";
                }
            }
        }

        return $h;
    }
}