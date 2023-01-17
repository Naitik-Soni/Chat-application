<?php
    include "connectdb.php";

    $Name=$Email=$Pnumber=$Password=$Confirm="";

    if(isset($_POST['signup'])){
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Pnumber = $_POST['pnumber'];
        $Password = $_POST['newpassword'];
        $Confirm = $_POST['confirmpass'];

        if($Password != $Confirm){
            echo "<script>
                alert('Password didnt match');
                document.getElementById('pass').focus();
            </script>";
        }
        else{
            session_start();
            $_SESSION['email'] = $Email;
            $sql = "INSERT INTO `user information`(`Name`, `Phone number`, `Email`, `Password`) VALUES ('$Name',$Pnumber,'$Email','$Password')";
            $conn->query($sql);
            header("location: upload photo.php");
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
    <title>Sign up</title>
</head>
<body>
    <form method="post">
        <h1>Sign up</h1>
        <label for="name">
            <input type="text" name="name" value="<?php echo $Name; ?>" placeholder="Enter Name" required>
        </label><br>
        <label for="pnumber">
            <input type="text" name="pnumber" value="<?php echo $Pnumber; ?>" placeholder="Enter Phone number" required pattern="[0-9]{10}">
        </label><br>
        <label for="email">
            <input type="email" name="email" value="<?php echo $Email; ?>" placeholder="Enter Email" required>
        </label><br>
        <label for="newpassword">
            <input type="password" name="newpassword" placeholder="New Password" required>
        </label><br>
        <label for="confirmpass">
            <input type="password" name="confirmpass" id="pass" placeholder="Confirm Password" required>
        </label><br>
        Already have an account? <a href="login.php">Login</a><br>
        <label for="signup">
            <input type="submit" value="Sign up" name="signup">
        </label>
    </form>
</body>
</html>