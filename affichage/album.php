<?php include("../affichage/header.php");
include("../misc/connexion.php");?>
<div class="row first">

</div>
<div class="row ">
    <?php
$tmp=0;
    $count=0;;
$sql = "SELECT * FROM album ORDER BY id DESC";
$query = $pdo->prepare($sql);
$query->execute();
while($line = $query->fetch()) {
    $tmp++;?>
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
        <?php if($tmp==12){
            echo "<div class='row'>";
            $tmp=0;
            $count++;
        }
        }
    for($i=1;$i<=$count;$i++){
        echo "</div>";
    }
    ?>
</div>
<?php include("../affichage/footer.php");
