<?php include("../affichage/header.php");
include("../misc/connexion.php");?>
       <div class="row first album">
            <?php
             $sql = "SELECT * FROM album WHERE id=?"; 
            $query = $pdo->prepare($sql);
            $query->execute(array($_GET['id']));
           while($line = $query->fetch()) {
               $annee=$line['annee'];
           ?>
               <div class="col-md-4">
                    <img src="<?php echo $line['pochette'];?>" class="img-responsive album-photo"/>
               </div>
               <div class="col-md-8">
                   <h2><?php echo $line['titre'];?></h2>
                   <p><?php echo $line['nbPiste'];?> piste(s)</p>
                   <?php 
                 $sql = "SELECT * FROM artiste WHERE id=?"; 
            $query = $pdo->prepare($sql);
            $query->execute(array($line['idArtiste']));
           while($line = $query->fetch()) {
               echo "<p><a href='../affichage/artiste.php?id=".$line['id']."'>".$line['nom']."</a></p>";
           }
               ?>               <p><?php echo substr($annee,4,-7);?></p>
               </div>
               <?php
           }?>
       </div>
       <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-8">
               <table>
                   <tr>
                       <th>
                           Titre
                       </th>
                       <th>
                           Durée
                        </th>
                   </tr>
        <?php
             $sql = "SELECT * FROM chanson WHERE idAlbum=?"; 
            $query = $pdo->prepare($sql);
            $query->execute(array($_GET['id']));
            $color=0;
           while($line = $query->fetch()) {
               if($color==1){
                   echo "<tr><td>".$line['titre']."</td><td>".$line['duree']."</td></tr>";
                   $color=0;
               }
               else{
                    echo "<tr class='color'><td>".$line['titre']."</td><td>".$line['duree']."</td></tr>";
                   $color=1;
               }
           }
?>
               </table>
           </div>
           <div class="col-md-2"></div>
       </div>
<?php include("../affichage/footer.php");?>