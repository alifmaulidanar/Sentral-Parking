<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="assets/logo/logo32x32.ico">
    <title>Sentral Parking - Login Petugas</title>
</head>
<body>
    <?php
        session_start();
        include "config/koneksi2.php";

        date_default_timezone_set("Asia/Jakarta");
        $waktu = date('H:i');
        $tanggal = date('D, d M Y');
        $tanggal_login = date('d-m-Y');
        $waktu_login = date('Y-m-d H:i:s');

        // $spcl_accss = 'spclaccss1145643';
        // $spcl_pass = "PandaDodgelion11459091//@";
        // $hash_spcl = password_hash($spcl_pass, PASSWORD_DEFAULT);
        // var_dump($hash_spcl);

        if (isset($_SESSION['username_petugas']) && isset($_SESSION['role_petugas'])) {
            header("Location: home.php");
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $query = mysqli_query($con, "SELECT * FROM data_petugas WHERE username = '$username' AND deleted = '0'");
            $row = mysqli_fetch_array($query);
            $hashed = $row['password'];

            $id_petugas = $row['id_petugas'];
        
            if ($row['username'] == $username && $row['id_petugas'] == $id_petugas && password_verify($password, $hashed)) {
                $_SESSION['username_petugas'] = $username;
                $_SESSION['password_petugas'] = $password;
                $_SESSION['id_petugas'] = $id_petugas;
                $_SESSION['role_petugas'] = "role_petugas";
                // $_SESSION['role'] = "petugas";
        
                $query = mysqli_query($con, "INSERT INTO data_aktivitas (id_petugas, waktu_login) VALUES ('$id_petugas', '$waktu_login')");
                // $query = mysqli_query($con, "INSERT INTO data_aktivitas SET id = '', id_petugas = (SELECT id_petugas FROM data_petugas WHERE username = '$username' AND password = '$password), '', '', '$waktu', '$tanggal_login'");
        
                echo "<script>alert('Login Petugas berhasil!');document.location.href='home.php?username=$username'</script>";
                // echo "<script>document.location.href='home.php?username=$username'</script>";
            }else{
                echo "<script>alert('Username atau Password salah!');document.location.href=''</script>";
            }
        }
        
        if (isset($_POST['mitra'])) {
            header('location:mitra/');
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
                                <div class="login-title">
                                    <p class="title text-center">Login<br>Petugas</p>
                                </div>
                                <div class="login-form">
                                    <form method="post" class="form">
                                        <div class="row justify-content-center username-field">
                                            <div class="col-lg-10 form-group">
                                                <input type="text" class="form-control" name="username" id="Username" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center password-field">
                                            <div class="col-lg-10 form-group">
                                                <input type="password" class="form-control" name="password" id="Password" placeholder="Password" minlength="8" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <button type="submit" name="login" id="Login" class="btn btn-primary tombol-login">Log In</button>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="row justify-content-center">
                                            <button type="submit" name="mitra" id="Mitra" class="btn btn-danger tombol-admin">Mitra</button>
                                            <!-- <a href="mitra/mitra.php" name="mitra" id="Mitra" class="btn btn-danger tombol-admin">Mitra</a> -->
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