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
                               while ($line=$query->fetch()) {
                                   $nbAlbum=$nbAlbum+1;
                               }
                               echo $nbAlbum." albums";
                ?>
            </div>
            <div class="card-action">

            </div>
        </div>
    </div>
    <div class="col s12 m9">
        <?php
                               $sql = 'SELECT * FROM album WHERE idArtiste=?';
                               $query = $pdo->prepare($sql);
                               $query->execute(array($_GET['id']));
                               while ($line=$query->fetch()) { ?>

        <?php } ?>
    </div>
</div>
<?php }
}
include("footer.php");
?>
