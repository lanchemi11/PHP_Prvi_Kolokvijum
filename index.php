<?php
    require_once "db.php";
    include "head.php";


    $stmt = $pdo->query("select * from rezervacija where potvrdjeno = 1");
    $rezervacije = $stmt->fetchAll();


?>


<div class="container">
  <h1>Home</h1>
</div>
    <table class="table table-condensed">

        <thead>
            <tr>
                <th>ID</th>
                <th>Frizer id</th>
                <th>Ime</th>
                <th>Termin</th>
                <th>Potvrdjeno</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($rezervacije as $r) { ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= $r['frizer_id'] ?></td>
                <td><?= $r['ime'] ?></td>
                <td><?= $r['termin'] ?></td>
                <td><?= $r['potvrdjeno'] ?></td>
                <td>
                    <a href="rezervisi.php?id=<?= $r['id'] ?>">Rezervisi</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php include "foot.php" ?>
