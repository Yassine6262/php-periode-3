<form method="post" action="">
  Naam: <input type="text" name="naam" id="naam"><br></br>
  Bericht: <textarea type="text" name="bericht" id="bericht"></textarea><br><br>
  <input type="submit" name="knop" id="knop">
</form>

<?php
  include "connectpdo.php";

  if(isset($_POST['knop'])) {
    $naam = $_POST['naam'];
    $bericht = $_POST['bericht'];
    $datumtijd = date("Y-m-d H:i:s"); // current date and time

    try {
      $stmt = $conn->prepare("INSERT INTO bericht (naam, bericht, datumstijd) 
      VALUES (:naam, :bericht, :datumstijd)");
     $stmt->bindParam(':naam', $naam);
     $stmt->bindParam(':bericht', $bericht);
     $stmt->bindParam(':datumstijd', $datumtijd);
  
  
      // Define the $datumtijd variable
      $datumtijd = date('Y-m-d H:i:s');
  
      $stmt->execute();
      header('location: index.php');
  } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  }

  $sqlSelect = "SELECT * FROM bericht";
  $data = $conn->query($sqlSelect);

  foreach ($data as $row) {
    echo $row['id'] . " ";
    echo $row['datumstijd'] . " ";
    echo $row['naam'] . " ";
    echo $row['bericht'] . " ";
    echo "<a href='VerwijderBericht.php?id=" . $row['id'] . "'>Verwijderen</a>";
    echo "<br/>";
  }
?>