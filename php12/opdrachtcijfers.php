<html>
<head>
    <title>cijfersysteem tabel</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>leerling</th>
            <th>cijfer</th>
        </tr> <map name=""></map>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cijfersysteem");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM cijfers";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["leerling"] . "</td>";
                echo "<td>" . $row["cijfer"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>