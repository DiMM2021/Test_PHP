<?php
    session_start();
    $successProfile = $_SESSION['success_profile'] ?? null;
    unset($_SESSION['success_profile']);

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
    <title>Профиль пользователя</title>
</head>

<body>

    <!-- Профиль -->

    <form>
        <h2 class="profile">Ваш профиль</h2>
        <table class="table">
            <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
            <tr>
                <th>Имя</th>
                <td><?= $_SESSION['user']['user_name'] ?></td>
            </tr>
            <tr>
                <th>Телефон</th>
                <td><?= $_SESSION['user']['phone'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $_SESSION['user']['email'] ?></td>
            </tr>
        </table>
        <div class="button_two">
            <a href="/update_profile.php" class="button_profile">Редактировать</a>
            <a href="/includes/logout.php" class="button_profile">Выйти</a>
        </div>
        <?php
            if ($successProfile) {
                echo '<p class="profile_success"> ' . $successProfile . ' </p>';
            }
        ?>
    </form>
</body>
</html>