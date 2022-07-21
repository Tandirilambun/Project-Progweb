<?php
    session_start();
    require 'koneksi.php';


    if(isset($_SESSION['user'])){
        if ($_SESSION['user']['username'] == 'admin') {
            header("location:dashboard-admin.php");
        }elseif ($_SESSION['user']['username'] != 'admin') {
            header("location:dashboard-user.php");
        }
    }

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = sha1($password);

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $query= mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) == 1){
            $loginuser = mysqli_fetch_assoc($query);
            $_SESSION['user'] = $loginuser;
            if ($_SESSION['user']['username'] == 'admin') {
                header("location:dashboard-admin.php");
            }elseif ($_SESSION['user']['username'] != 'admin') {
                header("location:dashboard-user.php");
            }
        }
        else{
            echo "Username atau password salah";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi | Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main>
        <div>
            <div class="content-luar">
                <div class="content-dalam">
                    <h3>Login</h3>
                    <img src="user.png" alt="">
                    <form method="post" >
                        <div class="uname">
                            <label for="username" class="form-label">Username</label><br>
                            <input type="text" class="form-control" autofocus name="username" id="username">
                        </div>
                        <div class="pass">
                            <label for="password" class="form-label">Password</label><br>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="tombol">
                            <div class="btn-group" role="group">
                                <button type="submit" name="submit" class="btn btn-primary">Login</button><br>
                                <a href="register.php" class="btn btn-warning">Dont have an account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>