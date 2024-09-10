
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
$f->init($h, "post", "/user/register/", "form_login", "");
$f->add_input($h, "login", "text", "input", "Логин","", "");
$f->add_input($h, "mail", "email", "input", "Электронная почта","", "");
$f->add_input($h, "password", "password", "input", "Логин","Пароль", "");
$f->add_input($h, "password2", "password", "input", "Логин","Повторить пароль", "");
$f->add_button($h, "go_reg", "btn_form btn", "", "yes", "Отправить");
$f->completion($h);
$f->buils($h);
echo $f->build; 


?>
            </div>
            </div>
        </div>
    </div>