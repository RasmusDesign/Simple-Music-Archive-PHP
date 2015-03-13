<?php
//    print_r($xml);
include("../misc/connexion.php");
$artiste=$_GET['artiste'];
$album=$_GET['album'];
$xml = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artiste&api_key=60966ad8946ffad0e7598a5084d4afe0");
$name=$xml->artist->name;
$xml_album = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=album.getinfo&artist=$name&album=$album&api_key=60966ad8946ffad0e7598a5084d4afe0");
$album=$xml_album->album->name;
//album($_GET['artiste'],$_GET['album']);
$tmp=0;
$sql = "SELECT * FROM artiste WHERE nom=?"; 
$query = $pdo->prepare($sql);
$query->execute(array($name)); 
while($line = $query->fetch()) {
    $tmp=$line['nom'];
} 
if($tmp==""){
    $xml = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artiste&api_key=60966ad8946ffad0e7598a5084d4afe0");
    $name=$xml->artist->name;
    $sourceimg = $xml->artist->image[4];
    $copyimg = str_replace(' ', '_', "../uploads/".uniqid().".jpg");
    copy($sourceimg, $copyimg);
    $sql = "INSERT INTO artiste VALUES (null,?,?)"; 
    $query = $pdo->prepare($sql);
    $query->execute(array($name,$copyimg)); 
}

$sql = "SELECT * FROM artiste WHERE nom=?"; 
$query = $pdo->prepare($sql);
$query->execute(array($name)); 
while($line = $query->fetch()) {
    $id_artiste=$line['id'];
}
$tmp=0;
$sql = "SELECT * FROM album WHERE titre=?"; 
$query = $pdo->prepare($sql);
$query->execute(array($album)); 
while($line = $query->fetch()) {
    $tmp=$line['titre'];
} 
if($tmp==""){
    $xml = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=album.getinfo&artist=$name&album=$album&api_key=60966ad8946ffad0e7598a5084d4afe0");
    $name=$xml->album->name;
    $sourceimg = $xml->album->image[4];
    $copyimg = str_replace(' ', '_', "../uploads/".uniqid().".jpg");
    copy($sourceimg, $copyimg);
    $track = $xml->album->tracks->track;
    $nbPiste=0;
    foreach($track as $piste){
        $nbPiste++;
    }
    $annee=$xml->album->releasedate;
    $sql = "INSERT INTO album VALUES (null,?,?,?,?,?)"; 
    $query = $pdo->prepare($sql);
    $query->execute(array($id_artiste,$nbPiste,$annee,$copyimg,$name));	$sql = "SELECT * FROM album WHERE titre=?"; 
    $query = $pdo->prepare($sql);
    $query->execute(array($album)); 
    while($line = $query->fetch()) {
        $id_album=$line['id'];
    }
    $track = $xml_album->album->tracks->track;
    foreach($track as $piste){
        $duree=$piste->duration;
        $heures=intval($duree / 3600);
        $minutes=intval(($duree % 3600) / 60);
        $secondes=intval((($duree % 3600) % 60));
        $duree=$heures.":".$minutes.":".$secondes;
        $sql = "INSERT INTO chanson VALUES (null,?,?,?)"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($piste->name,$duree,$id_album)); 
    } 
}
header("location:../affichage/");
?>