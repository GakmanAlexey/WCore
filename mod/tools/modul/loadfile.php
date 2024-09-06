<?php

namespace Mod\Tools\Modul;

Class Loadfile{

    
    public function load_img_arr($h){
        $x = 0;
        $uploadedFile = $_FILES[$h["upload_file"]["input_name"]];
        //var_dump($_FILES["file"]);
        foreach($_FILES["file"]["name"] as $item){
            $fileTmpPath = $uploadedFile ['tmp_name'][$x];
            $fileName = $uploadedFile ['name'][$x];
            $fileSize = $uploadedFile ['size'][$x];
            $fileType = $uploadedFile ['type'][$x];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = "timed" .rand(1000,9999). '.' . $fileExtension;
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'webp');
            if (!in_array($fileExtension, $allowedfileExtensions)) {
                echo "Недопустимый формат! только 'jpg', 'gif', 'png', 'webp'. <br>";
                echo "<a href='/admin/'>Назад</a>";
                die();
            }
            $uploadFileDir = MYPOS.SLASH.'upload'.SLASH;
            $h["upload_file"]["adress_timed_upload"] = $uploadFileDir;
            $dest_path = $uploadFileDir . $newFileName;
            if(!move_uploaded_file($fileTmpPath, $dest_path))
            {
                echo "Ошибка 1<br>";
                echo "<a href='/admin/'>Назад</a>";
                die();
            }
            $h["file_load_name"] = $newFileName;



        $h["upload_file"]["old_name"][] = $fileName;
        $h["upload_file"]["name"][] = $h["file_load_name"];
        $h["upload_file"]["type"][] = $fileType ;
        $h["upload_file"]["format"][] = $fileExtension;
        $h["upload_file"]["size"][] = $fileSize;

            $x++;
        }
        return $h;
    }

}