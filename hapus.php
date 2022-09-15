<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

require 'function.php';

$nis = $_GET['nis'];

if (hapus($nis) > 0) {
    echo "<script>
            alert('Данные учащегося успешно удалены!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
            alert('Не удалось удалить данные учащихся!');
        </script>";
}
