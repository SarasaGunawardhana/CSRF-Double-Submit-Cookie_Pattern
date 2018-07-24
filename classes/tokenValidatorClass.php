<?php
ob_start();
session_start();

if(isset($_POST['request']) && isset($_POST['token'])){

    if($_COOKIE['ssd_csrf'] == $_POST['token']){

        header("location: ../views/home.php?er=Request successfull!");

    }
    else {
        header("location: ../views/error.php?er=request validation failed!");
    }
}
else {
    header("location: ../views/error.php?er=something wrong ! :  invalid change state request!");
}
?>