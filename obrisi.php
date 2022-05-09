<?php
    require_once "auth.php";

    require_once "db.php";
    
    
    $stmt = $pdo->prepare("delete from rezervacija where id=?");
    $stmt->execute([$_GET['id']]);
    header("Location: admin.php");
    die();
?>