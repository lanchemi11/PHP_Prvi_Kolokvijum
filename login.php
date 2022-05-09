<?php
    require_once "db.php";


    if(isset($_POST['username'])){
        $stmt = $pdo->prepare("select * from user where username=? and password=?");
        $stmt->execute([$_POST['username'], $_POST['password']]);
        $frizer = $stmt->fetch();

        if($frizer){
            session_start();
            $_SESSION['frizer'] = $frizer;
            header("Location: admin.php");
            die();
        }else{
            $statusmsg = "Login nije uspeo";
        }
    }
    else{
        $statusmsg = "Login nije uspeo";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <form action="login.php" method="post" style="width:300px; margin-top:150px; margin-left: 35%;">
    <?php
        if(isset($statusmsg)){
            echo $statusmsg;
        }
    ?>
        <h1>Login</h1>
        <div class="form-group" >
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary">Login</button>
    </form>
    
</body>
</html>