
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
                        

                        <?php
$f = new \Mod\Tools\Modul\Forma;
$f->init($h, "post", "", "form_login", "");
$f->add_input($h, "name", "text", "input", "Имя","", "");
$f->add_input($h, "email", "text", "input", "Электронная почта","", "");
$f->add_input($h, "phone", "text", "input", "Телефон","", "");
$f->add_pass($h, "password", "password", "input", "Пароль","pas1", "");
$f->add_pass($h, "password2", "password2", "input", "Повторите пароль","pas2", "");
$f->add_button($h, "go_auth", "btn_form btn", "", "yes", "Сохранить");
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

    