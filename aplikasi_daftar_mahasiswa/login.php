<?php
session_start();
require 'functions.php';

//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
	
	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	
	//cek cookie dan username
	if($key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'"); 
	
	//cek username
	if(mysqli_num_rows($result) === 1 ){
		
		// cek password 
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			//set session
			$_SESSION["login"] = true;
			
			//cek remember me
			if(isset($_POST['remember'])){
				//buat cookie				
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}
			
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
	
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Halaman Login</title>
</head>

<body>
  <body class="bg-gradient-primary">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <div class="p-5 text-center">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                    </div>
					<?php if(isset($error)) : ?>
					<p style="color: red; font-style: italic;">username / password salah</p>
					<?php endif; ?>
                    <form action="" method="post">
                       <div class="form-group">
						<label for="username">Username :</label>
						<input autofocus type="text" class="form-control" id="username" name="username" placeholder="masukkan username" required>
						</div>
						<div class="form-group">
						<label for="password">Password :</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="masukkan password" required>
						</div>
						<div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                        <label class="custom-control-label" for="remember">Remember Me</label>
                      </div>
					  <br>
                      <button name="login" type="submit" class="btn btn-primary">Login</button>
                      <hr>
						<a class="btn btn-primary" href="registrasi.php" role="button">Registrasi</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
  </body>

</html>