<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query="select * from regisztralj where email= '$email' limit 1";
            $result=mysqli_query($conn, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password){
                        header("location: index.php");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Belépés</title>
    <link rel="shortcut icon" href="../image/images.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!--Molnár Csenge Anna-->
    <div class="wrapper">
        <form method="POST">
            <h1>Belépés</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxl-gmail'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Jelszó" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="forgot">
                <label>
                    <a href="./elfelejt_jelszo/elfejt.html">Elfelejtetted a jelszavad?</a>
                </label>
            </div>

            <input type="submit" class="btn" name="" value="Belépés"/>

            <div class="register-link">
                <p>Nincs fiókod? <a href="./regisztal/regisztalni.php">Regisztráció</a></p>
            </div>
        </form>
    </div>
</body>
</html>