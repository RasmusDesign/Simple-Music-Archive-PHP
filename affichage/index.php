<?php include("../affichage/header.php");
      include("../misc/connexion.php");?>
       <div class="row first">
           <div class="col-md-12">
               <h1>6 derniers albums ajoutés</h1>
           </div>
       </div>
       <div class="row">
           <?php
             $sql = "SELECT * FROM album ORDER BY id DESC LIMIT 6"; 
            $query = $pdo->prepare($sql);
            $query->execute();
           while($line = $query->fetch()) {
                echo "<div class='col-md-2 last-pochette'><a href='albumPage.php?id=".$line['id']."'><img src='".$line['pochette']."' alt='".$line['titre']."' class='img-responsive'/></a></div>";
           }?>
       </div>
<?php include("../affichage/footer.php");