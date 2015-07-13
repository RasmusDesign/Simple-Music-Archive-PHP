<?php
include('header.php');
include('../misc/connexion.php');
?>
<div class="row"></div>

<?php
    $sql = 'SELECT * FROM album WHERE titre like ?';
    $query = $pdo->prepare($sql);
    $query->execute(array("%".$_GET['q']."%"));
    while ($line=$query->fetch()) {
        echo $line['titre'];
    }
    $sql = 'SELECT * FROM artiste WHERE nom like ?';
    $query = $pdo->prepare($sql);
    $query->execute(array("%".$_GET['q']."%"));
    while ($line=$query->fetch()) {
        echo $line['nom'];
    }
    $sql = 'SELECT * FROM chanson WHERE titre like ?';
    $query = $pdo->prepare($sql);
    $query->execute(array("%".$_GET['q']."%"));
    while ($line=$query->fetch()) {
        echo $line['titre'];
    }
include('footer.php');
?>
