<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login.php");
    exit();
}
$user_asli = [['username' => 'Nick Bsryan',    'password' => 'nick123']];
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = isset($_POST['remember']);

if ($username === '' || $password === '') {
    $_SESSION['error'] = "Username dan password tidak boleh kosong.";
    header("Location: ../login.php");
    exit();
}
    $_SESSION['user'] = $username;
    $_SESSION['nama'] = $username;

    if (isset($_POST['remember'])) {
        setcookie('username', $username, time() + (3600), '/');
    }

    $_SESSION['error'] = "Username atau password salah.";
    header("Location: ../login.php");
    exit();

