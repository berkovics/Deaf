<?php
/*Molnár csenge Anna*/
$Keresztnev = $_POST['Keresztnev'];
$Vezeteknev = $_POST['Vezeteknev'];
$neme = $_POST['neme'];
$email = $_POST['email'];
$password = $_POST['password'];


//Adatbázis kapcsolat
$conn = new mysqli('localhost','root','','deaf');

if($conn->connect_error){
    die('Kapcsolat Sikertelen :' .$conn->connect_error);
}else{
    $stmt= $conn->prepare("insert into regisztralj(Keresztnev, Vezeteknev, neme, email, password)
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $Keresztnev, $Vezeteknev, $neme, $email, $password);
    $stmt->execute();
    echo "Sikert Regisztrálnot...";
    $stmt->close();
    $conn->close();
}
?>