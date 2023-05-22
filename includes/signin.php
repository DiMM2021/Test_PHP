<?php
    session_start();
    require_once 'connect.php';

    // Получение данных из формы
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    // Проверка, является ли введенное значение телефоном или email
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
      $condition = "`email` = '$login'";
    } else {
      $condition = "`phone` = '$login'";
    }

    // Проверка данных аутентификации в БД
    $checking_user = mysqli_query($connect, "SELECT * FROM `users` WHERE $condition AND `password` = '$password'");
    

    if (mysqli_num_rows($checking_user) > 0) {
        // Получаем ассоциативный массив с данными пользователя
        $user = mysqli_fetch_assoc($checking_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "user_name" => $user['user_name'],
            "phone" => $user['phone'],
            "email" => $user['email']
        ];

        header('Location: ../profile_page.php');

    } else {
        $_SESSION['error_signin'] = 'Неверный логин или пароль';
        header('Location: ../index.php');
    }
?>
