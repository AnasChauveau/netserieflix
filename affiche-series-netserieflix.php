<?php
  include "select.php";
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>BDD NetSerieFlix</title>

    <style type="text/css">
      body {
        font-family: sans-serif;
        font-size: 1.1em;
        margin-bottom: 50px;
      }
      h1 {
        color: #08457e;
      }
      h2 {
        color: #0198e1;
        margin-top: 40px;
        margin-bottom: 10px;
      }
      li {
        margin-top: 5px;
      }
      button[type='submit'] {
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <h1>BDD NetSerieFlix</h1>

    <h2>Liste des séries en base <i>(de la mieux notée à la moins bien notée)</i> :</h2>
    <ul>
     <?php
        selectOrdre()
     ?>
    </ul>

    <h2>Liste des séries appartenant au genre Comique</i> :</h2>
    <ul>
     <?php
        selectGenre("comique")
     ?>
    </ul>

    <h2>Afficher le nombre de saisons pour une série donnée :</h2>
    <!-- (On ne définit pas la propriété "action" car on veut que
        ça recharge la même page) -->
    <form method="get">
       <label for="cars">Choisir la série :
          <select name="nomSerie">
            <option value="..." >...</option>
          </select>
        </label>
        &nbsp;
        <button type="submit">Lancer la recherche</button>
    </form>

    <h2>Nombre d'épisodes par saison de la série Black Mirror :</h2>
    <!-- INDICATION : Vous n'avez besoin que des tables episode et serie
          pour cette requête -->
    <ul>
      <li>...</li>
    </ul>

  </body>
</html>