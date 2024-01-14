<?php
    session_start();

    include("../db.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $Keresztnev=$_POST['Keresztnev'];
        $Vezeteknev=$_POST['Vezeteknev'];
        $neme=$_POST['neme'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(!empty($email)&& !empty($password)&& !is_numeric($email))
        {
            $query="insert into regisztralj (Keresztnev, Vezeteknev, neme, email, password) values ('$Keresztnev', '$Vezeteknev', '$neme', '$email', '$password')";

            mysqli_query($conn, $query);

            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Please enter some Valid Information')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztrálj</title>
    <link rel="shortcut icon" href="../../image/images.png" type="image/x-icon">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <!--Berkovics Gellért-->
    <div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h1>Regisztrálj</h1>
                </div>
                <div class="pb panel-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="Keresztnev">Keresztnév</label><br>
                            <input type="text" class="form-control" id="Keresztnev" name="Keresztnev" required/>
                        </div>
                        <div class="form-group">
                            <label for="Vezeteknev">Vezetéknév</label><br>
                            <input type="text" class="form-control" id="Vezeteknev" name="Vezeteknev" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Neme</label>
                            <input type="text" class="form-control" name="neme" id="neme" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label><br>
                            <input type="text" class="form-control" id="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">Jelszó</label><br>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <input type="submit" class="btn btn-primary"/>
                    </form>
                </div>
                <div class="pf panel-footer text-right">
                    <p>Már van fiókja? <a href="../bejelentekezi.php">Bejelentkezés itt</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>