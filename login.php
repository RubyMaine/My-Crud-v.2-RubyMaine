<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

require 'function.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $_SESSION['login'] = true;
        header('location:index.php');
        exit;
    }
    $error = true;  
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Bootstrap 5-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
		<!-- Font Google -->
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

		<!-- Own CSS -->
		<link rel="stylesheet" href="css/login.css" />
        <link rel="icon" href="img/adminlogo.png" type="image/png">
		<title> Войти | RubyMaine | Bootstrap 5 | CRUD v.2 |</title>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container d-flex justify-content-center">
				<a class="navbar-brand" href="index.php"><img src="img/adminlogo.png" alt="images" style="width: 30px;"> | RubyMaine | Bootstrap 5 | CRUD v.2 | </a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		<!-- Close Navbar -->

		<div class="container-fluid vh-100" style="margin-top:300px">
			<div class="" style="margin-top:200px">
				<div class="rounded d-flex justify-content-center">
					<div class="col-lg-3 col-sm-12 shadow-lg p-5 bg-light" style="border-radius: 5px;">
						<div class="text-center">
							<h3 class="text-primary"> ВОЙТИ В СИСТЕМУ </h3>
						</div>

                        <?php if (isset($error)) : ?>
                            <?php echo '<script>alert("Неверный логин или пароль!");</script>'; ?>
                        <?php endif; ?>

						<form action="" method="post">
							<div class="p-4">
								<div class="input-group mb-3">
									<span class="input-group-text bg-primary"><i class="bi bi-person-badge-fill text-white"></i></span>
									<input type="text" required class="form-control" placeholder="Имя пользователя" name="username" autocomplete="off" />
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text bg-primary"><i class="bi bi-file-lock2-fill text-white"></i></span>
									<input type="password" required class="form-control" placeholder="Пароль пользователя" name="password" autocomplete="off" />
								</div>
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-danger float-right" name="login" type="submit">Войти <i class="fa fa-sign-in" aria-hidden="true"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Navbar -->
		<footer class="fixed-bottom navbar navbar-expand-lg navbar-dark bg-dark">
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
                            <a class="nav-link" href="" style="color: white;"><i class="fa fa-diamond" aria-hidden="true"></i> | RubyMaine | Bootstrap 5 | CRUD v.2 |</a>
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
