<?php
include "../db_link.php";
$act = $_GET['act'];
$modul = $_GET['modul'];
$tanggal = date("ymd");
$jam = date("H:i:s");
if ($modul == 'login' and $act == 'cek') {
    $logCek = mysqli_query($dblink, "select * from tbllogin where nama='$_POST[nama]' and password='$_POST[password]'");
    if (mysqli_num_rows($logCek)) {
        header("Location:alat-1");
    } else {
        header("Location:login");
    }
} else {
    echo "<center>Tidak Ada Modul</center>";
}
