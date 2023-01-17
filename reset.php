<?php
    include "connectdb.php";
    $email="naitiksoni1705@gmail.com";
    $new=$confirm="";
    if(isset($_POST['reset'])){
        $new = $_POST['new'];
        $confirm = $_POST['confirm'];
        
        if($new != $confirm){
            echo "<script>alert('Password does not match');</script>";
        }
        else{
            $sql = "UPDATE `user information` SET `Password`='$new' WHERE `Email`='$email'";
            $conn->query($sql);
            header("location: login.php");
        }
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
    <title>Reset Password</title>
    <style>
        form input{
            width: 200px;
        }
        h2{
            color: #e53225;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Reset Password</h2>
        <input type="password" name="new" placeholder="New password"><br>
        <input type="password" name="confirm" placeholder="Confirm password"><br>
        <input type="submit" value="Reset" name="reset">
    </form>
</body>
</html>