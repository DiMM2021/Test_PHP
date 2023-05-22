<?php
session_start();
require_once 'connect.php';

// Получение данных из формы
$user_name = $_POST['user_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$password = md5($_POST['password']);

// Запрос на обновление данных в БД
$query = mysqli_query($connect, "UPDATE `users` SET `user_name` = '$user_name', `phone` = '$phone', `email` = '$email', `password` = '$password' WHERE `id` =" . $_SESSION['user']['id']);

if ($query) {
    $_SESSION['success_profile'] = "Ваш профиль изменен! Для обновления данных выйдите из системы";
    header('Location: ../profile_page.php');
}