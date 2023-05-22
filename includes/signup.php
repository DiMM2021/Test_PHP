<?php
    session_start();
    require_once 'connect.php';

    // Получение данных из формы
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Проверка наличия пользователя с таким же email или телефоном
    $query = "SELECT * FROM `users` WHERE `email` = '$email' OR `phone` = '$phone' OR `user_name` = '$user_name'";
    $result = mysqli_query($connect, $query);

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "Пользователь с таким логином, email или телефоном уже существует.";
        header("Location: ../index.php");
    } elseif ($password !== $password_confirm) {
        $_SESSION['error_password'] = "Пароли не совпадают, попробуйте еще раз.";
        header('Location: ../registration.php');
    } else {
        // Запись в БД
        $password = md5($password);
        $query = mysqli_query($connect, "INSERT INTO `users` (`id`, `user_name`, `phone`, `email`, `password`) VALUES (NULL, '$user_name', '$phone', '$email', '$password')");
    
        if ($query) {
            $_SESSION['success_message'] = "Вы успешно зарегистрировались! Войдите через свой логин и пароль.";
            header("Location: ../index.php");
        }
    }
?>
    


