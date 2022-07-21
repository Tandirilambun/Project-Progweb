<?php
    require 'koneksi.php';

    if(isset($_POST['submit'])){


        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if($password==$confirmpassword){

            $password = sha1($password);

            $sql = "SELECT * FROM user WHERE username='$username'";
            $query = mysqli_query($conn, $sql);

            if(mysqli_num_rows($query)==0){
                
              $sql = "INSERT INTO  user(nama,username, password) VALUES('$name','$username','$password')";
              $query = mysqli_query($conn, $sql);
              
              

              if($query){
                echo "Registrasi Berhasil";
              }else{
                echo "Registrasi Gagal";
                echo $query;
              }

            }else{
                echo "Username sudah dipakai";
            }

        }else{
            echo "Konfirmasi Password salah";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi | Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <main>
        <div>
            <div class="content-luar">
                <div class="content-dalam">
                    <h3>Register</h3>
                    <img src="user.png" alt="">
                    <form method="post" id="regis-form">
                        <div class="data">
                            <label for="name" required class="form-label">Name</label><br>
                            <input type="text" class="form-control" autofocus required name="name" id="name">
                        </div>
                        <div class="data">
                            <label for="username" class="form-label">Username</label><br>
                            <input type="text" class="form-control" required name="username" id="username">
                        </div>
                        <div class="data">
                            <label for="password" class="form-label">Password</label><br>
                            <input type="password" class="form-control" required name="password" id="password">
                            <br>
                            <span class="error-password">Panjang teks harus 3-10 karakter</span><br>
                            <span class="error-password">Ada lowercase</span><br>
                            <span class="error-password">Ada uppercase</span><br>
                            <span class="error-password">Ada karakter unique (!?,.)</span><br>
                        </div>
                        <div class="data">
                            <label for="confirmpassword" class="form-label">Confirm Password</label><br>
                            <input type="password" class="form-control" required name="confirmpassword" id="confirmpassword">
                        </div>
                        <div class="tombol">
                            <div class="btn-group" role="group">
                                <button type="submit" name="submit" class="btn btn-primary">Register</button><br>
                                <a href="login.php" class="btn btn-warning">Have an account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="registervalid.js"></script>

</html>