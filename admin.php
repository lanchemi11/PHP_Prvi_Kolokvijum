<?php
    require_once "auth.php";
    require_once "db.php";
    include "head.php";

    $stmt = $pdo->query("select * from rezervacija where potvrdjeno = 0");
    $rezervacije = $stmt->fetchAll();


?>




<div class="container">
  <h1>Admin panel</h1>
    <div style="float: right;">
        <a href="logout.php">Odjavi se</a>
    </div>
</div>


    <table class="table table-condensed">

        <thead>
            <tr>
                <th>Ime</th>
                <th>Termin</th>
                <th></th>
                <th></th>
                <th>Potvrdjeno</th> 
                <th>Rezervacija</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($rezervacije as $r) { ?>
            <tr>
                <td><?= $r['ime'] ?></td>
                <td><?= $r['termin'] ?></td>
                <?php if($r['potvrdjeno'] == 0) { ?>
                <td>
                    <a href="potvrdi.php?id=<?= $r['id'] ?>">Potvrdi</a>
                </td>
                <?php } ?>
                <td>
                    <a href="obrisi.php?id=<?= $r['id'] ?>">Obrisi</a>
                </td>
                <td><?= $r['potvrdjeno'] ?></td>
                <td>
                    <a href="rezervisi.php?id=<?= $r['id'] ?>">Rezervisi</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php include "foot.php" ?>
