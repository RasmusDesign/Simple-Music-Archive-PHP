<?php include("../affichage/header.php");
include("../misc/connexion.php");?>
<div class="row first album">
    <?php
$sql = "SELECT * FROM album WHERE id=?";
$query = $pdo->prepare($sql);
$query->execute(array($_GET['id']));
while($line = $query->fetch()) {
    $annee=$line['annee'];
    $pochette=$line['pochette'];
    $color=$line['color'];
    ?>
    <div class="col s12 m3 card-albumpage">
        <div class="card ">
            <div class="card-image">

                <img src="<?php echo $line['pochette'];?>">
                <span class="card-title"><?php echo $line['titre'];?></span>
            </div>
            <div class="card-content">
                <p><?php echo $line['nbPiste']; ?> piste(s)</p>
            </div>
            <div class="card-action">
                <?php
    $sql = "SELECT * FROM artiste WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($line['idArtiste']));
    while($line = $query->fetch()) {

        echo "<p><a href='../affichage/artiste.php?id=".$line['id']."' style='color:".$color.";' class='card_action_lien'>".$line['nom']."</a></p>";
    }
                ?>
            </div>
        </div>

        <?php
}?>
    </div>
    <div class="col s12 m9 table-albumpage">
        <table class="centered striped hoverable">
            <thead style="background-color:<?php echo $color; ?>">
                <tr>
                    <th data-field="titre">
                        Titre
                    </th>
                    <th data-field="duree">
                        Durée
                    </th>
                </tr>
            </thead>
            <?php
$sql = "SELECT * FROM chanson WHERE idAlbum=?";
$query = $pdo->prepare($sql);
$query->execute(array($_GET['id']));
$color=0;
while($line = $query->fetch()) {
    $duree=explode(".",$line['duree']);
    echo "<tr><td>".$line['titre']."</td><td>".$duree[0]."</td></tr>";
}
            ?>
        </table>
    </div>
</div>
<?php include("../affichage/footer.php");?>
