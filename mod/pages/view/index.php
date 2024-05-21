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
$f = new \Mod\Tools\Modul\Forma;
$f->init($h, "post", "\\", "noclass", "");
$f->add_input($h, "name", "text", "noclass2", "ggg","id1", "222");
$f->add_button($h, "go", "", "", "yes", "вперед");
$f->buils($h);
echo $f->build; 


?>
            </div>
        </div>
    </div>
