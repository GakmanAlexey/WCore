<?php
$pass = "dasdasdasdasdasdasdas";
echo $pass;
echo "<br>";
$hash = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 14]);
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

?>