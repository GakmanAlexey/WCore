<?php

namespace Mod\User\Modul;

Class Config{
    //shead
    public $login_min  = 4;
    public $login_max  = 20;
    public $pass_min  = 8;
    public $pass_max  = 64;
    public $hash_cost = 10;

    public $login_min_msg  = "Минимальная длинна логина 4";
    public $login_max_msg  = "Максимальная длина логина 20";
    public $pass_min_msg  = "Минимальная длина пароля 8";
    public $pass_max_msg  = "Максимальная длина пароля 64";
    public $mail_error_msg  = "Ошибка в написание почты";
    public $login_not_free_msg  = "Логин занят";
    public $pass_not_pass2  = "Пароли не совпадают";
    public $err_its_auth = "У вас уже есть учетная запись";

    public $start_status  = "new";
    public $status_confirm_email  = "job";
    public $status_ban  = "ban";



}
