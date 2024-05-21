<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    foreach($h["head"]["css"] as $element_css){
        echo '<link rel="stylesheet" href="'.$element_css.'">';
    }
    ?>
    
    <title><?php echo $h["head"]["title"];?></title>
    <meta name="description" content="<?php echo $h["head"]["description"];?>">
    <link rel="icon" sizes="<?php echo $h["head"]["formanico"];?>" href="<?php echo $h["head"]["ico"];?>">
    <meta name="generator" content="<?php echo $h["head"]["generator"];?>">
    <meta name="theme-color" content="<?php echo $h["head"]["themeColor"];?>">
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>

    <?php
    header("Pragma-directive: no-cache");
    header("Cache-directive: no-cache");
    header("Cache-control: no-cache");
    header("Pragma: no-cache");
    header("Expires: 0");
    ?>
</head>