<?php include("../affichage/header.php");
include("../misc/connexion.php");?>
<div class="row first">

</div>
<div class="row first">
    <?php
$tmp=0;
    $count=0;;
$sql = "SELECT * FROM album"; 
$query = $pdo->prepare($sql);
$query->execute();
while($line = $query->fetch()) {
    $tmp++;?>
        <div class="col-md-1">
        <a href="albumPage.php?id=<?php echo $line['id']; ?>"><img src="<?php echo $line['pochette'];?>" class="img-responsive"/></a>
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