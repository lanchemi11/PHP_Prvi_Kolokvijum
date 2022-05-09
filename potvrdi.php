<?php
    require_once "auth.php";

    require_once "db.php";
    
    
    $stmt = $pdo->prepare("update rezervacija set potvrdjeno = 1 where id=?");
    $stmt->execute([$_GET['id']]);
    header("Location: admin.php");
    die();
?>