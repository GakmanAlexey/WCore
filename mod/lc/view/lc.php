
<div class="info_polzovatel flex">
        <div class="container">
            <div class="title_block">
                Личный кабинет
            </div>
        </div>
        <div class="container">
            <div class="razdel_box">
                <a href="/lc/" class="razdel_item razdel_item_active">Мои данные</a>
                <a href="/lc/balance/" class="razdel_item">Кошелек</a>
                <a href="/lc/cods/" class="razdel_item">Мои коды</a>
            </div>
        </div>

        <div class="lk flex">
            <div class="container">
                <div class="lk_par">
                    <div class="lk_box">    
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
$f->init($h, "post", "", "form_login", "");
$f->add_input($h, "name", "text", "input", "Имя","", $h["user"]["data_lc"]["user_name"]);
$f->add_input($h, "email", "text", "input", "Электронная почта","", $h["user"]["data_lc"]["user_mail"]);
$f->add_input($h, "phone", "text", "input", "Телефон","", $h["user"]["data_lc"]["user_phone"]);
$f->add_pass($h, "password", "password", "input", "Пароль","pas1", "");
$f->add_pass($h, "password2", "password", "input", "Повторите пароль","pas2", "");
$f->add_button($h, "go_save_lc", "btn_form btn", "", "yes", "Сохранить");
$f->completion($h);
$f->buils($h);
echo $f->build; 

echo "<script>".$f->js."</script>"


?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    