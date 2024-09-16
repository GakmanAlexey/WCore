<?php

namespace Mod\Tools\Modul;

Class Lovecookie{

    
    public function start($h){
        echo '
        <!-- START Cookie-Alert -->
        <div id="cookie_note">
            <p>Мы используем файлы cookies для улучшения работы сайта. Оставаясь на нашем сайте, вы соглашаетесь с условиями
                использования файлов cookies. Чтобы ознакомиться с нашими Положениями о конфиденциальности и об использовании
                файлов cookie, <a href="#" target="_blank">нажмите здесь</a>.</p>
            <button class="button cookie_accept btn btn-primary btn-sm">Я согласен</button>
        </div>
        <!-- END Cookie-Alert -->
        ';

        echo 
        '
<script>
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }


    function checkCookies() {
        let cookieNote = document.getElementById("cookie_note");
        let cookieBtnAccept = cookieNote.querySelector(".cookie_accept");

        // Если куки cookies_policy нет или она просрочена, то показываем уведомление
        if (!getCookie("cookies_policy")) {
            cookieNote.classList.add("show");
        }

        // При клике на кнопку устанавливаем куку cookies_policy на один год
        cookieBtnAccept.addEventListener("click", function () {
            setCookie("cookies_policy", "true", 365);
            cookieNote.classList.remove("show");
        });
    }

    checkCookies();
    
</script>        
        '
        ;
        return $h;
    }

    


}
