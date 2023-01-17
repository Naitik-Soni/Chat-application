<?php
    include "connectdb.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Chat application/phpmailer/src/Exception.php';
    require 'C:\xampp\htdocs\Chat application/phpmailer/src/PHPMailer.php';
    require 'C:\xampp\htdocs\Chat application/phpmailer/src/SMTP.php';

    $email=""; 

    

    if(isset($_POST['sendlink'])){
        $email=$_POST['email'];
        $sql = "SELECT `Email` FROM `user information` WHERE `Email`='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){

        }
        else{
            echo "<script>alert('Account does not exist');</script>";
            header("location: sign up.php");
        }
        session_start();
        $_SESSION['email']=$email;

        $msg = "
        <div
            style='width: 400px;
            height: 300px;
            border-radius: 5px;
            box-shadow: 0 0 3px grey;
            padding: 15px;
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;'
        >
        <h1>Reset Password</h1>
        <p style='width: 100%;
        word-wrap: break-word;'>Hey we have got an request to change your password for your Chat Titans application.</p>
        <a style='background: white;
        text-decoration: none;
        color: #e53225;
        padding: 5px 10px;
        border: 1px solid #e53225;
        border-radius: 5px;' href='login.php'>Change password</a>
        </div>
        ";
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='naitiksoni1705@gmail.com';
        $mail->Password='kwtwqbevjibqiewn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('naitiksoni1705@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject ='Reset password';
        $mail->Body = $msg;

        $mail->send();
        //header('location: getOTP.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="main.css">
    <title>Forgot password</title>
    <style>
        h2{
            margin-bottom: 15px;
            color: #e53225;
        }
        div {
            width: 400px;
            border-radius: 5px;
            box-shadow: 0 0 3px grey;
            padding: 15px;
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        div img {
            width: 300px;
            height: auto;
        }

        div p {
            width: 100%;
            word-wrap: break-word;

        }

        a {
            background-color: white;
            text-decoration: none;
            color: #e53225;
            padding: 5px 10px;
            border: 1px solid #e53225;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Forgot password</h2>
        <label for="email">
            <input type="email" name="email" placeholder="Enter Email" required>
        </label><br>
        <label for="signup">
            <input type="submit" value="Send link" name="sendlink">
        </label>
    </form>
</body>
</html>