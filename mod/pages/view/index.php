<?php
/*
$pass = "dasdasdasdasdasdasdas";
echo $pass;
echo "<br>";
$hash = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 10]);
echo $hash;
echo "<br>";

$hash2 = '$2y$12$N6ccgChFrDO4t4N5hz6SJ.Srtm5J6NFL8DiTNJhbbp/j6cQFXGCjm';

if (password_verify($pass, $hash2)) {
    echo 'Пароль правильный!';
} else {
    echo 'Пароль неправильный.';
}

$hash2 = '$2y$12$5oGU8bnOM7vJM6DRedi/deqvmPvvL4bKmjqcIL3jxLf7k6s6bBye.';

if (password_verify($pass, $hash2)) {
    echo 'Пароль правильный!';
} else {
    echo 'Пароль неправильный.';
}

*/
?>
    <div class="yvedoml flex">
        <div class="container">
            <div class="yvedoml_box">
                <div class="title_block">
                    Главная страница
                </div>
<?php
$f = new \Mod\Admin\Modul\Buildl;
//$h = $f->add_element($h, $father, $name_en, $name_ru, $url, $prioritet, $action, $ico, $permission);
$h = $f->add_element($h, "/", "constructor", "Конструктор" ,"constructor", 1, 1, "1.png", "constructor.admin");
$h = $f->add_element($h, "/", "users", "Пользователи" ,"users", 12, 1, "3.png", "users.moder");
$h = $f->add_element($h, "/", "statistic", "Статистика" ,"statistic", 8, 1, "8.png", "super");
$h = $f->add_element($h, "constructor", "index", "Главная" ,"index", "1", 2, "1.png", "constructor.index.admin");
$h = $f->add_element($h, "/", "shop", "магазин" ,"shop", 1, 1, "8.png", "shop.trader");
$h = $f->add_element($h, "constructor", "onas", "О нас" ,"onas", 1, 2, "1.png", "constructor.onas.admin");
$h = $f->build_menu($h);
var_dump("<pre>",$f->pre_build_lvl1,"</pre>");
?>
            </div>
        </div>
    </div>
