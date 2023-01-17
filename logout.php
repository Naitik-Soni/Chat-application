<?php
    session_start();
    include "connectdb.php";
    $Email=$q="";
    $q = intval($_GET['q']);
    $Email=$_SESSION['email'];
    $sql = "UPDATE `user information` SET `Active`=0 WHERE `Email`='$Email'";
    $conn->query($sql);
    session_unset();
?>