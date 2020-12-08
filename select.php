<?php 
session_start();
include "../database.php";

$selectChat = mysqli_query($conn, "SELECT * FROM cornertb ORDER BY id DESC");
while($fetchChat = mysqli_fetch_assoc($selectChat)){
    if(strcasecmp($fetchChat["dari_user"],$_SESSION["nama"]) == 0){$chatClass = "myChat";}
    else{$chatClass = "theirChat";}

echo("<span class='$chatClass'>");
    echo("<a class='chatNama'>".$fetchChat['dari_user']."</a>");
    echo("<a class='chatTeks'>".$fetchChat['teks']."</a>");
    echo("<a class='chatOn'>".$fetchChat['time_teks']."</a>");
echo("</span>");
}
?>