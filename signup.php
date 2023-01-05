<?php

require_once("config.php");

if(isset($_POST['sign-up'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    $sql = "INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    $saved = $stmt->execute($params);

    if($saved) header("Location: login.php");
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
    <title>Sign Up</title>
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
                                <input type="email" name="email" for="email" placeholder="Email" />
                                <input type="password" name="password" for="password" placeholder="Password" />
                                <input type="submit" class="btn" name="sign-up" value="Sign Up" />
                            </form>
                            <p class="sign-up">Udah punya akun?<a href="login.php"> Login dong</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>