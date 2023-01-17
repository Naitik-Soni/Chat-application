<?php
    session_start();
    $Email=$path=$photo=$name=$email="";
    $Email=$_SESSION['email'];
    if($Email == true){}
    else{
        //header("location: login.php");
    }
    $id=$_COOKIE['chatting'];
    include "connectdb.php";

    $sql = "SELECT * FROM `user information` WHERE `ID`=$id";
    $result = $conn->query($sql);
    if($result->num_rows<=0){

    }else{
        $row = $result->fetch_assoc();
        $photo = $row['Photo'];
        $name = $row['Name'];
        $email=$row['Email'];
        $path="./Users/";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script>
    <title>Chatting</title>
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
        section{
            width: 400px;
            height: 600px;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid black;

        }
        #user2{
            width: 400px;
            height: auto;
            display: grid;
            grid: 80px / 20px 80px 295px;
            background: rgba(245, 50, 37, 0.2);
        }
        #user2 img{
            width: 70px;
            height: 70px;
            margin: 5px;
            border-radius: 50%;
            box-shadow: 0 0 2px grey;
        }
        #user2 p{
            height: 80px;
            padding: 5px;
            padding-top: 31px;
            font-size: 18px;
            vertical-align: middle;
        }
        i{
            font-size: 18px;
            padding-top: 31px; 
            cursor: pointer;
            margin-left: 5px;
        }
        form{
            position: relative;
            top: -22px;
            left: 5px;
        }
        input{
            font-size: 16px;
            width: 345px;
            max-width: 345px;
            word-wrap: break-word;
            word-break: break-all;
            height: 35px;
            border-radius: 35px;
            padding: 0 10px;
            box-sizing: border-box;
            border: 1px solid rgb(240,240,240);
            background: #eee;
            outline: none;
        }
        button{
            height: 35px;
            width: 35px;
            position: relative;
            top: 24px;
            border-radius: 50%;
            margin-right: 5px;
            border: none;
            outline: none;
            background: #e53225;
        }
        #send{
            position: relative;
            top: -22px;
            right: 5px;
            color: white;
        }
        #msgs::-webkit-scrollbar{
            display:none;
        }
        #msgs{
            max-width: 400px;
            max-height: 480px;
            padding: 5px;
            box-sizing: border-box;
            height: 480px;
            overflow: scroll;
            scrollbar-width: none;
        }
        .sender, .receiver{
            max-width: 250px;
            word-wrap: break-word;
            padding: 5px;
            box-sizing: border-box;
            border-radius: 5px;
            margin: 5px;
        }
        .sender{
            background-color: #e53225;
            color: white;
            position: relative;
            left: 135px;
        }
        .receiver{
            border: 1px solid #e53225;
            color: #e53225;
            background-color: white;
        }
    </style>
    <script>
        function back(){
            //alert("do you want to go back");
            //globalVariable.logs=0;
            document.cookie = "chats=0";
            document.location = "chats.php";
        }

        function send(){
            
            /*var box = document.getElementById('msgs');
            var msg = document.getElementById('hello');
            if(msg.value == ""){
                return;
            }
            var p = document.createElement("p");
            p.appendChild(document.createTextNode(msg.value));
            p.classList.add("sender");
            box.appendChild(p);
            msg.value = "";*/
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("msgs").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getmessage.php?q=",true);
            xmlhttp.send();
            document.getElementById('msgs').scrollTop = document.getElementById('msgs').scrollHeight;
        }

        setInterval(send, 500);

        /*while(setTimeout(send, 1000)){
            
        }*/

    </script>
</head>
<body>
    <section>
        <div id="user2">
            <i class="fa-solid fa-arrow-left" onclick="back()"></i>
            <img src="<?php echo $path.$photo; ?>" alt="">
            <p><?php echo $name; ?></p>
        </div>
        <div id="msgs">
            <!--<p class="sender">Hello this is Naitik Soni.</p>
            <p class="receiver">Hello This is Tushar pankhaniya.</p>
            <p class="sender">Hey what's up bro.</p>
            <p class="sender">What are you doing here</p>
            <p class="receiver">I am fine. what are you doing now and where are you?</p>-->
        </div>
        <form action="" method="post">
            <input type="text" name="message" placeholder="Type your message here" id="hello">
            <button type="submit" name="send">
                <i id="send" class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </section>
</body>
</html>

<?php
    if(isset($_POST['send'])){
        $message=$_POST['message'];
        $sql = "INSERT INTO `messages`(`FromUser`, `ToUser`, `Message`) VALUES ('$Email','$email','$message')";
        $conn->query($sql);
    }
?>