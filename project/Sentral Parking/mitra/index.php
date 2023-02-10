<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mitra.css">
    <link rel="icon" href="../assets/logo/logo32x32.ico">
    <title>Sentral Parking - Login Mitra</title>
</head>
<body>
    <?php
        include "../config/koneksi2.php";

        date_default_timezone_set("Asia/Jakarta");
        $waktu = date('H:i');
        $tanggal = date('D, d M Y');
        $tanggal_login = date('d-m-Y');
        $waktu_login = date('Y-m-d H:i:s');

        if (isset($_SESSION['username_mitra']) && isset($_SESSION['role_mitra'])) {
            header("Location: data-petugas.php");
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $query = mysqli_query($con, "SELECT * FROM data_mitra WHERE username = '$username' AND deleted = '0'");
            $row = mysqli_fetch_array($query);
            $hashed = $row['password'];

            $id_mitra = $row['id_mitra'];
        
            if ($row['username'] == $username && $row['id_mitra'] == $id_mitra && password_verify($password, $hashed)) {
                session_start();
                $_SESSION['username_mitra'] = $username;
                $_SESSION['password_mitra'] = $password;
                $_SESSION['id_mitra'] = $id_mitra;
                $_SESSION['role_mitra'] = "role_mitra";
                // $_SESSION['role'] = "mitra";
        
                $query = mysqli_query($con, "INSERT INTO data_aktivitas (id_mitra, waktu_login) VALUES ('$id_mitra', '$waktu_login')");
                // $query = mysqli_query($con, "INSERT INTO data_aktivitas SET id = '', id_mitra = (SELECT id_mitra FROM data_mitra WHERE username = '$username' AND password = '$password), '', '', '$waktu', '$tanggal_login'");
        
                echo "<script>alert('Login Mitra berhasil!');document.location.href='data-petugas.php?username=$username'</script>";
                // echo "<script>document.location.href='home.php?username=$username'</script>";
            }else{
                echo "<script>alert('Username atau Password salah!');document.location.href=''</script>";
            }
        }

        if (isset($_POST['kembali'])) {
            header('location:../');
        }
    ?>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- clock area -->
            <div class="col col-lg-4 clock-area text-white text-center d-table">
                <div class="waktu d-table-cell align-middle">
                    <h2 class="jam"><?= $waktu ?></h2><br><p class="hari-tanggal"><?= $tanggal ?></p>
                </div>
            </div>

            <!-- login area -->
            <div class="col-lg-8 bg-area">
                <div class="container-flex h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                        <!-- <div class="col-lg-2"></div> -->
                        <div class="col-lg-6">
                            <div class="login-area">
                                <div class="login-title text-center">
                                    <p class="title text-center">Login<br>Mitra</p>
                                </div>
                                <div class="login-form">
                                    <form method="post" class="form">
                                        <div class="row justify-content-center username-field">
                                            <div class="col-lg-10 form-group">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center password-field">
                                            <div class="col-lg-10 form-group">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="8" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <button type="submit" name="login" id="Login" class="btn btn-primary tombol-login">Log In</button>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="row justify-content-center">
                                            <button type="submit" name="kembali" id="Kembali" class="btn btn-danger tombol-admin">Petugas</button>
                                            <!-- <a href="../index.php" name="kembali" id="Kembali" class="btn btn-danger tombol-admin">Kembali</a> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-2"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>