<?php
$conn = mysqli_connect("localhost", "root", "", "poll");

$poll_query = "SELECT vraag FROM poll WHERE id = 1"; 
$poll_result = mysqli_query($conn, $poll_query);
$poll_row = mysqli_fetch_assoc($poll_result);
echo "<h2>" . $poll_row['vraag'] . "</h2>";

echo "<form method='post'>";
$options_query = "SELECT * FROM optie WHERE id >= 1"; 
$options_result = mysqli_query($conn, $options_query);
while ($options_row = mysqli_fetch_assoc($options_result)) {
    echo "<input type='radio' name='optie' id='" . $options_row['id'] . "' value='" . $options_row['id'] . "'>" . $options_row['optie'] . "<br>";
}
echo "<input type='submit' name='stemmen' value='Stemmen'>";
echo "</form>";
if (isset($_POST['stemmen'])) {
    $optie_id = $_POST['optie'];
    $stem_query = "UPDATE optie SET stemmen = stemmen + 1 WHERE id = $optie_id";
    mysqli_query($conn, $stem_query);
    header("Location: bedankt.php"); 
    exit;
}
?>