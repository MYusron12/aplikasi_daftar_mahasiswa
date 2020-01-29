<?php
require 'functions.php';
if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
		alert('user baru berhasil di tambahkan');
		</script>";
  } else {
    echo mysqli_error($conn);
  }
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

  <title>Halaman Registrasi</title>
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
                      <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
                    </div>
                    <form action="" method="post">
                      <div class="form-group">
                        <input autofocus type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" required>
                      </div>
                      <button name="register" type="submit" class="btn btn-primary">Register</button>
                      <hr>
                    </form>
					  <a class="btn btn-primary" href="login.php" role="button">Login</a>
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