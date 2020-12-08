<?php
session_start();
if($_SESSION["masuk"] == false){header("location:../masuk.php");}


if(isset($_POST["keluar"])){
    session_unset();
    session_destroy();
    header("refresh:0.1");
}

$pesan = "<br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script type="text/javascript" src="include/jquery.js"></script>
    <title>The Corner</title>
</head>
<body>
<style>img[alt="www.000webhost.com"]{display:none;}</style>
    <div class="label">
        <span class="rightLabelSpan">
            <form style="float: right;" method="POST">
                <button name="keluar" type="submit" class="outBtn">Keluar</button>
            </form>
            <a href="../akun.php" class="akunBtn">Akun</a>
        </span>
        <span class="symbol">&#9876</span>
        <span class="labelTitle">Union</span>
    </div>
    <div>
        <span class="corLabel">The Corner</span>
    <span class="chatBox">
        <!--------------Chat user akan dipanggil disini---------------->
    </span>
    <form method="POST" class="chatForm">
        <input type="text" name="teks" class="chatText">
        <button type="button" name="chatBtn" class="chatBtn" onclick="ChatInsert();">>></button>
    </form>
    </div>
    <div class="botLabel">
        <a href="../index.php" class="botBtn">Home</a>
        <a href="../forum/poscreat.php" class="botBtn">Posting</a>
        <a href="../about.html" class="botBtn">About</a>
    </div>
    <script>
        //jika state dan status sudah OK maka...
        $(document).ready(function(){
            //panggil function dan set interval 1 detik
            setInterval(function(){
                //load select.php ke chatbox
                $('.chatBox').load('select.php');
                //console.log("hello"); <-- hanya debug abaikan
            }, 1000); //<--- 1000 == 1 detik
        })

        //jika chatBtn di click
        function ChatInsert(){
            //wadahi input user
            var _data = $('.chatForm').serialize();
            //request ajax
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: _data,
                cache: false,
                //jika success
                success: function(){
                    //load select.php ke chatbox
                    $('.chatBox').load('select.php');
                    //mereset input jadi null
                    $('.chatText').val(null);
                }
            })
        }
    </script>
</body>
</html>