<?php
    session_start();
    include "connectdb.php";
    $Email = $_SESSION['email'];
    if($Email == true){

    }else{
        header("location: login.php");
    }
    $id=$_COOKIE['chatting'];
    $sql = "SELECT * FROM `user information` WHERE `ID`=$id";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $email=$row['Email'];
    
    $sql = "SELECT * FROM `messages` WHERE (FromUser='$Email' AND ToUser='$email') OR (FromUser='$email' AND ToUser='$Email')";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
        $message = $row['Message'];
        if($Email == $row['FromUser']){
            echo "<p class='sender'>".$message."</p>";
        }else{
            echo "<p class='receiver'>".$message."</p>";
        }
    }
    
?>