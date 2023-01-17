<?php
    session_start();
    include "connectdb.php";
    $email=$Photo="";
    $email = $_SESSION['email'];

    if($email == true){}
    else{
        header("location: sign up.php");
    }
    if(isset($_POST['upload'])){
        $Photo = $_FILES['photos']['name'];
        $temp1 = $_FILES['photos']['tmp_name'];
        move_uploaded_file($temp1,"./Users/".$Photo);
        $sql = "UPDATE `user information` SET `Photo`='$Photo' WHERE Email='$email'";
        $conn->query($sql);
        header('location: login.php');
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="shortcut icon" href="Logo.png" type="image/x-icon">
    <title>Upload photo</title>

    <style>
        form input{
            width: 200px;
            height: auto;
        }
        h2{
            margin-bottom: 10px;
            color: #e53225;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload your photo</h2>
        <input type="file" name="photos" required><br>
        <input type="submit" value="Upload" name="upload">
    </form>
</body>
</html>