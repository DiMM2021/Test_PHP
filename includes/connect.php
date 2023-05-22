<?php 
    // Подключение к БД
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'maestro');

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Проверка соединения на ошибки
    if (!$connect) {
        die('Ошибка подключения');
    }
?>
