

    <div class="login flex">
        <div class="container">
            <div class="login_par">
                <div class="login_box">
                    <div class="title_block_registr">
                        Вход
                    </div>
                <p>
                <?php
foreach($h["user"]["error"] as $item_error){
    if($item_error == "no") continue;
    echo $item_error.'<br>';
}
?>

</p>
<?php
$f = new \Mod\Tools\Modul\Forma;
$f->init($h, "post", "/user/login/", "form_login", "");
$f->add_input($h, "login", "text", "input", "Логин","", "");
$f->add_input($h, "password", "password", "input", "Пароль","", "");
$f->add_button($h, "go_auth", "btn_form btn", "", "yes", "Отправить");
$f->completion($h);
$f->buils($h);
echo $f->build; 


?>
                    <a class="vost" href="/user/recover/">
                        Забыли пароль?
                    </a>
                    <p class="form_link_box">Если у вас ещё нет аккаунта <a class="form_link" href="/user/register/">Зарегистрируйтесь</a></p>
            </div>
        </div>
    </div>
    </div>
