<?php
    session_start();
    if(!isset($_SESSION['frizer'])){
        header("Location: login.php");
        die();
    }

?>