<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Music Archive</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"/>
        <link type="text/css" rel="stylesheet" href="../css/style.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta charset="UTF-8">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <nav class="teal">
            <div class="nav-wrapper">
                <a href="../affichage/" class="brand-logo">Music Archive</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <div class="input-field">
                            <form action="recherche.php" method="get">
                                <input type="text" class="validate" id="search" name="q">
                                <label class="white-text menu-search" for="search">Recherche</label>
                            </form>
                        </div>
                    </li>
                    <li><a href="album.php">Albums</a></li>
                    <li><a href="">Artistes</a></li>
                    <li><a class="modal-trigger" href="#modal1">Ajouter un album</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="album.php">Albums</a></li>
                    <li><a href="">Artistes</a></li>
                    <li><a class="modal-trigger" href="#modal1">Ajouter un album</a></li>
                    <li>
                        <div class="input-field"><form action="recherche.php" method="get">
                            <input type="text" class="validate black-text" name="q" id="search-mobile">
                            <label class="black-text menu-search-mobile" for="search-mobile">Recherche</label></form>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
            <form method="GET" action="../traitement/ajoutAlbum.php">
                <div class="modal-content">
                    <h4>Ajouter un album</h4>
                    <div class="input-field">
                        <input id="albumAdd" type="text" class="validate" name="album" required>
                        <label for="albumAdd">Album</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="artiste" class="validate" id="artisteAdd" required/>
                        <label for="artisteAdd">Artiste</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" value="ajouter">Ajouter</button>

                </div>
            </form>
        </div>
