<?php
$conn = mysqli_connect("localhost", "root", "", "cijfersysteem");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM cijfers";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>id</th><th>leerling</th><th>cijfer</th></tr>";
    $cijfers = array();
    $hoogste_cijfer = 0;
    $laagste_cijfer = 10;
    $hoogste_naam = "";
    $laagste_naam = "";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["leerling"] . "</td>";
        echo "<td>" . $row["cijfer"] . "</td>";
        echo "</tr>";
        $cijfer = $row["cijfer"];
        if ($cijfer > $hoogste_cijfer) {
            $hoogste_cijfer = $cijfer;
            $hoogste_naam = $row["leerling"];
        }
        if ($cijfer < $laagste_cijfer) {
            $laagste_cijfer = $cijfer;
            $laagste_naam = $row["leerling"];
        }
        $cijfers[] = $cijfer;
    }
    echo "</table>";

    $gemiddelde = array_sum($cijfers) / count($cijfers);

    echo "<p>Gemiddelde cijfer: " . round($gemiddelde, 2) . "</p>";
    echo "<p>Hoogste behaalde cijfer: " . $hoogste_cijfer . " (behaald door " . $hoogste_naam . ")</p>";
    echo "<p>Laagste behaalde cijfer: " . $laagste_cijfer . " (behaald door " . $laagste_naam . ")</p>";
} 
else {
    echo "0 results";
}

mysqli_close($conn);

?>