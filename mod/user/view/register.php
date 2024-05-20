<div class="login flex">
        <div class="container">
            <div class="login_box">
                <div class="title_block">
                    Регистрация
                </div>
                <p>
<?php
foreach($h["user"]["error"] as $item_error){
    if($item_error == "no") continue;
    echo $item_error.'<br>';
}
?>

                </p>
                <form class="form_login" action="/user/register/" method="post">
                    <input class="input" type="text" name ="login" placeholder="Логин">
                    <input class="input" type="email" name ="mail"  placeholder="Электронная почта">
                    <input class="input" type="password" name ="password" placeholder="Пароль">
                    <input class="input" type="password" name ="password2" placeholder="Повторить пароль">
                    <button class="btn_form btn" name="go_reg" value="yes">Отправить</button>
                </form>
            </div>
        </div>
    </div>