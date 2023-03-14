<?php
$conn = mysqli_connect("localhost", "root", "", "poll");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$total_query = "SELECT SUM(stemmen) AS total FROM optie";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_votes = $total_row['total'];

echo "<h3>Poll resultaten:</h3>";

$options_query = "SELECT * FROM optie";
$options_result = mysqli_query($conn, $options_query);
while ($options_row = mysqli_fetch_assoc($options_result)) {
    $votes = $options_row['stemmen'];
    $percentage = round(($votes / $total_votes) * 100);
    echo "<p>" . $options_row['optie'] . ": " . $votes . " stemmen (" . $percentage . "%)</p>";
}
?>
<p><a href="opdracht15.php">Terug naar de homepagina</a></p>