<?php
    session_start();
    include "connectdb.php";
    $Email="";
    $Email = $_SESSION['email'];
    if($Email == true){
        $sqli = "UPDATE `user information` SET `Active`=1 WHERE `Email`='$Email'";
        $conn->query($sqli);
    }else{
        header("location: login.php");
    }

    $sql = "SELECT `Name`, `Photo` FROM `user information` WHERE `Email`='$Email'";
    $path="./Users/";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $dp = $row['Photo'];
    $name = $row['Name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo.png" type="image/x-icon">
    <title>Chats</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: candara;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        div{
            display: grid;
            grid: 80px / 80px 320px; 
            width: 400px;
        }
        div:not(#me){
            cursor: pointer;
        }
        div:not(#me):hover{
            background: rgb(240,240,240);
        }
        #me{
            position: sticky;
        }
        div img{
            width: 70px;
            height: 70px;
            margin: 5px;
            border-radius: 50%;
            box-shadow: 0 0 2px grey;
        }
        div p{
            height: 80px;
            padding: 5px;
            padding-top: 31px;
            font-size: 18px;
            vertical-align: middle;
        }
        section#txts{
            width: 400px;
            height: auto;
            box-shadow: 0 0 3px grey;
            border-radius: 5px;
        }
        
        hr{
            width: 98%;
            margin-left: 1%;
        }
        hr:last-child{
            display: none; 
        }
        div:nth-child(1){
            background: rgba(245, 50, 37, 0.2);
        }
        h3{
            width: 100%;
            text-align: center;
            padding: 10px 0;
            font-family: verdana;
        }
    </style>

    <script>
    
        
        /*function myFunction(){
            /*var expires;
            var name="logout";
            var date = new Date();
            date.setTime(date.getTime() + (5 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = escape(name) + "=" + escape() + expires + "; path=/";
            if(getCookie(chats) == 0){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("sp").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","logout.php?q=",true);
                xmlhttp.send();
                globalVariable.logs=1;
                return "Hello";
                document.location="login.php";
            }
        }*/

        function func(e){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txt").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getuser.php?q=",true);
            xmlhttp.send();
        }

        function showUser(ab){
            document.cookie = "chats=1";
            var expires;
            var name="chatting";
            var date = new Date();
            date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            document.cookie = escape(name) + "=" + escape(ab) + expires + "; path=/";
            document.location = "chatting.php";
        }  

    </script>
</head>
<body onbeforeunload="return myFunction()" onmousemove="func(event)">

    <section id="txts">
        <div id="me">
            <img src="<?php echo $path.$dp; ?>" alt="">
            <p><?php echo $name; ?></p>
        </div>
        <section id="txt">

        </section>
    </section>
    <span id="sp"></span>
</body>
</html>