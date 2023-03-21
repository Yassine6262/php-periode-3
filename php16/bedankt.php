<?php
$conn = mysqli_connect("localhost", "root", "", "poll");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$stellingquery = "SELECT vraag FROM poll LIMIT 1";
$stellingresult = mysqli_query($conn, $stellingquery);
$stellingrow = mysqli_fetch_assoc($stellingresult);
$stelling = $stellingrow['vraag'];


$totalquery = "SELECT SUM(stemmen) AS total FROM optie";
$totalresult = mysqli_query($conn, $totalquery);
$totalrow = mysqli_fetch_assoc($totalresult);
$totalstemmen = $totalrow['total'];


echo "<h3>Poll resultaten:</h3>";
echo "<table border=1>";
echo "<tr><th>Stelling:</th><td>" . $stelling . "</td></tr>";
echo "<tr><th>Opties:</th><th>Aantal stemmen:</th><th>Percentage:</th></tr>";
$optiesquery = "SELECT * FROM optie";
$optiesresult = mysqli_query($conn, $optiesquery);
while ($optiesrow = mysqli_fetch_assoc($optiesresult)) {
    $stemmen = $optiesrow['stemmen'];
    $percentage = round(($stemmen / $totalstemmen) * 100);
    echo "<tr><td>" . $optiesrow['optie'] . "</td><td>" . $stemmen . "</td><td>" . $percentage . "%</td></tr>";
}
echo "</table>";
?>

<p><a href="opdracht5.php">Terug naar de homepagina</a></p>
