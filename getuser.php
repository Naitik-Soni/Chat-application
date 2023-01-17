<?php
    session_start();
    $Email=$q="";
    $Email=$_SESSION['email'];
    include "connectdb.php";
    $path="./Users/";
    $q = intval($_GET['q']);
    $sql = "SELECT * FROM `user information` WHERE `Active`=1";
    $photos=$names=$id="";
    $sql = "SELECT * FROM `user information` WHERE `Active`=1 AND `Email`!='$Email'";
    $result = $conn->query($sql);
    echo "<h3>".$result->num_rows." Users   </h3><hr>";
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $photos = $row['Photo'];
            $names = $row['Name'];
            $id = $row['ID'];
            echo "
                <div id='".$id."' onclick='showUser(".$id.")'>
                <img src='".$path.$photos."'>
                <p>".$names."</p>
                </div><hr>
            ";
        }
    }
?>