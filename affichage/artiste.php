<?php
include("header.php");
include("../misc/connexion.php");

$sql = 'SELECT * FROM artiste WHERE id=?';
$query = $pdo->prepare($sql);
$query->execute(array($_GET['id']));
while ($line=$query->fetch()) {
?>
<div class="row first">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <img src="<?php echo $line['photo']; ?>">
                <span class="card-title"><?php echo $line['nom']; ?></span>
            </div>
            <div class="card-content">
                <?php
                               $sql = 'SELECT * FROM album WHERE idArtiste=?';
                               $query = $pdo->prepare($sql);
                               $query->execute(array($_GET['id']));
                               $nbAlbum=0;
                               $aleatAlbum=array();
                               while ($line=$query->fetch()) {
                                   $nbAlbum=$nbAlbum+1;
                                   $aleatAlbum[]=$line['id'];
                               }
                               echo $nbAlbum." albums";
                ?>
            </div>
            <div class="card-action">
                <?php
                shuffle($aleatAlbum);
                $sql = 'SELECT * FROM album WHERE id=?';
                $query = $pdo->prepare($sql);
                $query->execute(array($aleatAlbum[0]));
                while ($line=$query->fetch()) {
                    echo "<p><a href='albumPage.php?id=".$line['id']."' class='card_action_lien'>Découvrir ".$line['titre']."</a></p>";
                } ?>
            </div>
        </div>
    </div>
    <div class="col s12 m9">
        <div class="row">
        <?php
            $sql = 'SELECT * FROM album WHERE idArtiste=?';
            $query = $pdo->prepare($sql);
            $query->execute(array($_GET['id']));
            while ($line=$query->fetch()) { ?>
<div class="col s12 m3 l2 ">
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
    </div>
</div>
<?php }

include("footer.php");
?>
