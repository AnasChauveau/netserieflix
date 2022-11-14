<?php

function selectOrdre(){
    try {
        require "bd.php";
        $stmt = $conn->prepare("SELECT nom_serie, note FROM serie order by note desc");
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v) {
          echo "<li>".$v['nom_serie']." note : ".$v['note']."/100</li>";
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
}

function selectGenre($genre){
    try {
        require "bd.php";
        $stmt = $conn->prepare("SELECT nom_serie FROM serie s
        inner join appartenir a on s.id_serie = a.id_serie
        inner join genre g on a.id_genre = g.id_genre
        WHERE g.nom_genre = '".$genre."';");
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v) {
          echo "<li>".$v['nom_serie']."</li>";
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
}

function selectSerie(){
  try {
      require "bd.php";
      $stmt = $conn->prepare("SELECT id_serie, nom_serie FROM serie s");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach($stmt->fetchAll() as $k=>$v) {
        echo "<option value='".$v['id_serie']."'>".$v['nom_serie']."</option>";
      }
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
}

function selectNbEpisode_saison($serie){
  try {
    require "bd.php";
    $stmt = $conn->prepare("SELECT e.num_saison, count(num_ep) as episode FROM serie sr
    INNER JOIN saison ss ON sr.id_serie = ss.id_serie
    INNER JOIN episode e ON ss.num_saison = e.num_saison
    WHERE nom_serie = '".$serie."'
    GROUP BY e.num_saison");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $k=>$v) {
      echo"<li>La saison numéro ".$v["num_saison"]." a ".$v["episode"]." episodes</li>";
    }
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

?>