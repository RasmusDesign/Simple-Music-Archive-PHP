<?php
include('header.php');
include('../misc/connexion.php');
?>
<div class="row first">
    <div class="col s12">
        <div class="row">
            <?php
$sql = 'SELECT * FROM album WHERE titre like ? LIMIT 4';
$query = $pdo->prepare($sql);
$query->execute(array("%".$_GET['q']."%"));
while($line = $query->fetch()) { ?>
            <div class="col s12 m3 l3 ">
                <div class="card album_card ">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator album_img" src="<?php echo $line['pochette']; ?>" alt="<?php echo $line['titre']; ?>">
                    </div>
                    <div class="card-content">
                        <div class="card-title activator grey-text text-darken-4"><?php echo $line['titre']; ?></div>
                        <p><a href="albumPage.php?id=<?php echo $line['id']; ?>">Détails sur l'album</a></p>
                    </div>
                    <div class="card-reveal">

                        <span class="card-title grey-text text-darken-4"><?php echo $line['titre']; ?></span>
                        <p><?php echo $line['description']; ?></p>
                    </div>
                    <div class="ellips"></div>
                </div>
            </div>
            <?php }

echo "</div><div class='row'>";
$sql = 'SELECT * FROM artiste WHERE nom like ? LIMIT 4';
$query = $pdo->prepare($sql);
$query->execute(array("%".$_GET['q']."%"));
echo '<div class="row">';
while ($line=$query->fetch()) { ?>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image image_artiste_search" style="background-image:url('<?php echo $line['photo']; ?>');">
                        <span class="card-title"><?php echo $line['nom']; ?></span>
                    </div>
                    <div class="card-action">
                        <a href="artiste.php?id=<?php echo $line['id']; ?>">Détails sur l'artiste</a>
                    </div>
                </div>
            </div>
            <?php }
echo '</div><div class="row"><div class="col s12">'; ?>
            <table class="bordered centered">
                <thead class="teal lighten-2">
                    <tr>
                        <th>Titre</th>
                        <th>Durée</th>
                    </tr>
                </thead>
                <?php
$sql = 'SELECT * FROM chanson WHERE titre like ? LIMIT 20';
$query = $pdo->prepare($sql);
$query->execute(array("%".$_GET['q']."%"));
while ($line=$query->fetch()) {
                ?> <tr>
                <td><?php echo $line['titre']; ?></td>
                <td><?php echo $line['duree']; ?></td>
                </tr> <?php
}
                ?>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php
include('footer.php');
?>
