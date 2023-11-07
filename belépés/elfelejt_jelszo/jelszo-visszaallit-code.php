<?php
/*Molnár Csenge Anna*/
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_name,$get_email,$token)
{
    $mail=new PHPMailer(true);
    //$mail->SMTPDebug = 2;                      
    $mail->isSMTP();                                           
    $mail->SMTPAuth= true;     

    $mail->Host= "smtp.gmail.com"; 
    $mail->Username= "valami@gmail.com";                     
    $mail->Password= "***";                               

    $mail->SMTPSecure= "tls";            
    $mail->Port= 587;                                    

   
    $mail->setFrom('valami@gmail.com', $get_name);
    $mail->addAddress($get_email);     
    
    $mail->isHTML(true);
    $mail ->Subject="Reset Password Notification";

    
    $email_template="
        <h2>Hello</h2>
        <h3>Azért kapta ezt az e-mailt, mert kaptunk egy jelszó-visszaállítási kérést a fiókjához.</h3>
        <br/><br/>
    ";

    $mail->Body =$email_template;
    $mail->send();

}

if(isset($_POST['Jelszó-visszaállítási link']))
{
    $email=mysqli_real_escape_string($conn, $_POST['$email']);
    $token=md5(rand());

    $check_email="SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run=mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run)>0)
    {
        $row =mysqli_fetch_array($check_email_run);
        $get_name=$row['name'];
        $get_email=$row['email'];


        $check_email="UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run=mysqli_query($conn, $update_token);

        if($update_token_run)
        {
            send_password_reset($get_name, $get_email,$token);
            $_SESSION['status']="e-mailben küldtünk egy jelszó-visszaállítási linket";
            header("Localhost: jelszo-visszaallit.php");
            exit(0);
        }else
        {
            $_SESSION['status']="valami elromlott. #1";
            header("Localhost: jelszo-visszaallit.php");
            exit(0);
        }
    }else
    {
        $_SESSION['status']="Nem található Email";
        header("Localhost: jelszo-visszaallit.php");
        exit(0);
    }
}
?>