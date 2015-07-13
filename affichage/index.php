<?php include("../affichage/header.php");
include("../misc/connexion.php");?>
<div class="row first">
    <div class="col m12" style="margin-top:10px;">
        <span style="font-size:24px;">6 derniers albums ajoutés</span> <a href="album.php" class="btn right">Voir tout</a>
    </div>
</div>
<div class="row">
    <?php
$sql = "SELECT * FROM album ORDER BY id DESC LIMIT 6";
$query = $pdo->prepare($sql);
$query->execute();
while($line = $query->fetch()) { ?>
    <div class="col s12 m2 l2 ">
        <div class="card album_card ">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator album_img" src="<?php echo $line['pochette']; ?>">
            </div>
            <div class="card-content">
                <div class="card-title activator grey-text text-darken-4"><?php echo $line['titre']; ?></div>
                <p><a href="albumPage.php?id=<?php echo $line['id']; ?>">Détails sur l'album</a></p>
            </div>
            <div class="card-reveal">

                <span class="card-title grey-text text-darken-4"><?php echo $line['titre']; ?></i></span>
            <p><?php echo $line['description']; ?></p>
        </div>
        <div class="ellips"></div>
    </div>
</div>
<?php } ?>

</div>
<?php include("../affichage/footer.php");
