<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

require 'function.php';

if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Данные учащихся успешно добавлены!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Не удалось добавить данные учащихся!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Own CSS -->
    <link rel="icon" href="img/adminlogo.png" type="image/png">
    <title>| RubyMaine | Bootstrap 5 | CRUD v.2 |</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/adminlogo.png" alt="images" style="width: 30px;"> | RubyMaine | Bootstrap 5 | CRUD v.2 | </a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="index.php"aria-current="page" href="#" style="color: white;"><i class="bi bi-house-fill text-white"></i> Главный </a>
                    </li>&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="logout.php" style="color: white;">Выйти <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp; ДОБАВИТЬ ДАННЫЕ</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nis" class="form-label"><i class="bi bi-menu-button-wide-fill"></i> Идентификатор: </label>
                        <input type="number" class="form-control w-50" id="nis" placeholder="Наберите Идентификатор:" min="1" name="nis" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label"><i class="bi bi-person-badge-fill"></i> Имя и Фамилия: </label>
                        <input type="text" class="form-control form-control-md w-50" id="nama" placeholder="Имя и Фамилия:" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tmpt_Lahir" class="form-label"><i class="bi bi-geo-fill"></i> Место рождения: </label>
                        <input type="text" class="form-control w-50" id="tmpt_Lahir" placeholder="Место рождения:" name="tmpt_Lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_Lahir" class="form-label"><i class="bi bi-calendar4-week"></i> Дата рождения: </label>
                        <input type="date" class="form-control w-50" id="tgl_Lahir" name="tgl_Lahir" max="01-01-2006" required>
                    </div>
                    <div class="mb-3">
                        <label><i class="bi bi-check2-all"></i> Выберите пол: </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="Мужчина" value="Мужчина">
                            <label class="form-check-label" for="Muschina"> Мужчина </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="Женщина" value="Женщина">
                            <label class="form-check-label" for="Perempuan"> Женщина </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label"><i class="bi bi-box-arrow-in-down-right"></i> Выбор категории: </label>
                        <select class="form-select w-50" id="jurusan" name="jurusan">
                            <option disabled selected value>------------------------------------------------- Выберите категории -------------------------------------------------</option>
                            <option value="Инжиниринг сети доступа"> Инжиниринг сети доступа </option>
                            <option value="Компьютерная и сетевая инженерия"> Компьютерная и сетевая инженерия </option>
                            <option value="Мультимедиа сети"> Мультимедиа сети </option>
                            <option value="Программная инженерия"> Программная инженерия </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fa fa-envelope" aria-hidden="true"></i> Введите ваш E-Mail: </label>
                        <input type="email" class="form-control w-50" id="email" placeholder="Введите ваш E-Mail: example@mail.ru" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label"><i class="bi bi-image-fill"></i> Фотография <i> (в настоящее время): </i></label>
                        <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><i class="bi bi-credit-card-2-front"></i> Введите ваш Адрес: <i> (в настоящее время): </i></label>
                        <textarea class="form-control w-50" id="alamat" rows="5" name="alamat" placeholder="Введите ваш Адрес: (в настоящее время):" autocomplete="off" required></textarea>
                    </div>
                    <hr>
                    <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-clockwise"></i> Сброс данный </a>
                    <button type="submit" class="btn btn-primary" name="simpan"><i class="bi bi-check2-square"></i> Сохранить </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->



    <!-- Navbar -->
    <footer class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"> Copyright © 2022 </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="bi bi-github text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="bi bi-telegram text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="bi bi-terminal-fill text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="color: white;"> | <i class="fa fa-diamond" aria-hidden="true"></i> RubyMaine | Bootstrap 5 | CRUD v.2 |</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Close Navbar -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>