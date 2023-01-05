<?php

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);

    $params = array(
        ":username" => $username,
        ":email" => $username
    );
    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user;
            header("Location: home.php");
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelog.css">
    <link rel="icon" href="logo.png">
    <title>Login</title>
</head>
<body>
<section id="login">
        <div class="wrapper-login">
            <div class="box">
                <div class="container">
                    <div class="container2">
                        <div class="btn-login">
                            <img src="logo.png" alt="logo re:film">
                            <h2>RE:FILM</h2>
                            <p>Tempat Rekomendasi Film Terseru</p>
                            <form action="" method="POST">
                                <input type="text" name="username" for="username" placeholder="Username" />
                                <input type="password" name="password" for="password" placeholder="Password" />
                                <input type="submit" class="btn" name="login" value="Login" />
                            </form>
                            <p class="sign-up">Belum ada akun?<a href="signup.php"> Daftar dong</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>