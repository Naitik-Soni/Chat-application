<?php
    session_start();
    $_SESSION['email'] = "";
    include "connectdb.php";
    $Email=$Password="";

    if(isset($_POST['login'])){
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $sql = "SELECT `Email`, `Password` FROM `user information` WHERE `Email` = '$Email' AND `Password` = BINARY'$Password'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $_SESSION['email'] = $Email;
            $sql = "UPDATE `user information` SET `Active`=1 WHERE `Email`='$Email'";
            $conn->query($sql);
            header("location: chats.php");
        }
        else{
            echo '<script>alert("Wrong Email or Password");</script>';
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
    <link rel="stylesheet" href="Main.css">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <h1>Login</h1>
        <label for="email">
            <input type="email" value="<?php echo $Email; ?>" name="email" placeholder="Enter Email" required>
        </label><br>
        <label for="newpassword">
            <input type="password" name="password" placeholder="Enter Password" required>
        </label><br>
        <a href="Forgot password.php">Forgot password?</a><br>
        <label for="signup">
            <input type="submit" value="Login" name="login">
        </label>
    </form>
</body>
</html>