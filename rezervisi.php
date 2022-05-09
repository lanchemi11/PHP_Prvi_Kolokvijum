<?php
    require_once "db.php";
    include "head.php";    

    
    $stmt = $pdo->query("select * from frizer");
    $frizeri = $stmt->fetchAll();

    $stmt = $pdo->query("select * from rezervacija");
    $rezervacije = $stmt->fetchAll();

    
    
    if(isset($_POST['frizer']))
    {
        if(!intval($_POST['frizer'])){
            echo "Greska!";
            die();
        }
    
        if(strlen($_POST['ime']) < 3){
            echo "Greksa!";
            die();
        }

        $stmt = $pdo->prepare("insert into rezervacija (frizer_id, ime, termin, potvrdjeno) values (?,?,?,0)");
        $stmt->execute([$_POST['frizer'], $_POST['ime'], $_POST['termin']]);
        header("Location: index.php");
        die();
    }
    else{
        echo "Niste popunili formu";
    }
    
    
    
    

?>

    <form action="rezervisi.php" method="post">
        <label>Frizer:</label>
        <select name="frizer">
        <?php foreach($frizeri as $f) { ?>
            <option value="<?= $f['id'] ?>"><?= $f['ime'] ?></option>
       <?php } ?>
        </select>
        <br>
        <label>Ime:</label>
        <input type="text" name="ime">
        <br>
        <label>Termin:</label>
        <input type="date" name="termin">

        <button class="btn btn-primary">Unesi</button>
    </form>


<?php include "foot.php" ?>