<?php
    session_start();

    $errorMessage = $_SESSION['error_message'] ?? null;
    unset($_SESSION['error_message']);

    $successMessage = $_SESSION['success_message'] ?? null;
    unset($_SESSION['success_message']);

    $errorSignin = $_SESSION['error_signin'] ?? null;
    unset($_SESSION['error_signin']);

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        header('Location: profile_page.php');
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная страница</title>
</head>
<body>

    <!-- Форма авторизации -->

    <form class="form" action="/includes/signin.php" method="post">
        <label>Логин</label>
        <input class="input" type="text" name="login" placeholder="Введите ваш телефон или email">
        <label>Пароль</label>
        <input class="input" type="password" name="password" placeholder="Введите ваш пароль">
        <button class ="button" type="submit">Войти</button>
        <p class="p_form">У вас нет аккаунта? - <a href="/registration.php" class="a_href">Зарегистрируйтесь</a></p>

        <?php
            if ($errorMessage) {
                echo '<p class="msg_error"> ' . $errorMessage . ' </p>';
            }

            if ($errorSignin) {
                echo '<p class="msg_error"> ' . $errorSignin . ' </p>';
            }

            if ($successMessage) {
                echo '<p class="msg_success"> ' . $successMessage . ' </p>';
            }
        ?>
    </form>
</body>
</html>