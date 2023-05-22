<?php
    session_start();
    $errorPassword = $_SESSION['error_password'] ?? null;
    unset($_SESSION['error_password']);

    $errorSignup = $_SESSION['error_signup'] ?? null;
    unset($_SESSION['error_signup']);

    if (!isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Редактирование профиля</title>
</head>

<body>

    <!-- Форма редактирования -->

    <form class="form" action="/includes/update.php" method="post">
    <h2 class="profile">Редактировать профиль</h2>
    <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
        <label>Имя</label>
        <input class="input" type="text" name="user_name" value="<?= $_SESSION['user']['user_name'] ?>">
        <label>Телефон</label>
        <input class="input" type="phone" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
        <label>Email</label>
        <input class="input" type="email" name="email" value="<?= $_SESSION['user']['email'] ?>">
        <label>Пароль</label>
        <input class="input" type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input class="input" type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button class ="button" type="submit">Редактировать</button>
        
        <?php
            if ($errorPassword) {
                echo '<p class="msg_error"> ' . $errorPassword . ' </p>';
            }
        ?>

    </form>

</body>
</html>