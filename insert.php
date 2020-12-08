<?php
session_start();
include "../database.php";

$teks = htmlspecialchars(mysqli_real_escape_string($conn ,$_POST["teks"]));
$nama = $_SESSION["nama"];

if(empty(trim($teks))){return;}

else{mysqli_query($conn, "INSERT INTO cornertb(id,dari_user,teks,time_teks) 
                        VALUES(null,'$nama','$teks','$timeText')");}
?>