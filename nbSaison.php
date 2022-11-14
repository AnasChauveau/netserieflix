<?php

$id = $_GET['nomSerie'];

try {
    require "bd.php";
    $stmt = $conn->prepare("SELECT count(num_saison) as nb FROM saison ss
    INNER JOIN serie sr ON ss.id_serie = sr.id_serie
    WHERE ss.id_serie = '".$id."'");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    header("location:affiche-series-netserieflix.php?nb=".$result[0]['nb']);
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

?>