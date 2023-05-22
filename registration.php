<?php
    session_start();
    $errorPassword = $_SESSION['error_password'] ?? null;
    unset($_SESSION['error_password']);

    $errorSignup = $_SESSION['error_signup'] ?? null;
    unset($_SESSION['error_signup']);

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
    <title>Регистрация пользователя</title>
</head>

<body>

    <!-- Форма регистрации -->

    <form class="form" action="/includes/signup.php" method="post">
        <label>Имя</label>
        <input class="input" type="text" name="user_name" placeholder="Введите имя">
        <label>Телефон</label>
        <input class="input" type="phone" name="phone" placeholder="Введите телефон">
        <label>Email</label>
        <input class="input" type="email" name="email" placeholder="Введите email">
        <label>Пароль</label>
        <input class="input" type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input class="input" type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button class="button" type="submit">Войти</button>
        <p class="p_form">У вас уже есть аккаунт? - <a href="/index.php" class="a_href">Авторизируйтесь</a></p>

        <?php
            if ($errorPassword) {
                echo '<p class="msg_error"> ' . $errorPassword . ' </p>';
            }

            if ($errorSignup) {
                echo '<p class="msg_error"> ' . $errorSignup . ' </p>';
            }
        ?>

    </form>

</body>
</html>