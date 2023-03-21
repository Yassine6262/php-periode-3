<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "browsers";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function browserinfo($user_agent) {
    $browser_name = '';
    $os_name = '';

    if (preg_match('/Chrome/i', $user_agent)) {
        $browser_name = 'Chrome';
    } elseif (preg_match('/Safari/i', $user_agent)) {
        $browser_name = 'Safari';
    } elseif (preg_match('/Firefox/i', $user_agent)) {
        $browser_name = 'Firefox';
    } elseif (preg_match('/MSIE/i', $user_agent) || preg_match('/Trident/i', $user_agent)) {
        $browser_name = 'Internet Explorer';
    }

    if (preg_match('/Windows NT 10\.0/i', $user_agent)) {
        $os_name = 'Windows 10';
    } elseif (preg_match('/Windows NT 6\.3/i', $user_agent)) {
        $os_name = 'Windows 8.1';
    } elseif (preg_match('/Windows NT 6\.2/i', $user_agent)) {
        $os_name = 'Windows 8';
    } elseif (preg_match('/Windows NT 6\.1/i', $user_agent)) {
        $os_name = 'Windows 7';
    } elseif (preg_match('/Macintosh/i', $user_agent)) {
        $os_name = 'Mac OS X';
    } elseif (preg_match('/Linux/i', $user_agent)) {
        $os_name = 'Linux';
    }

    return array('browser_name' => $browser_name, 'os_name' => $os_name);
}

$user_agent_info = browserinfo($user_agent);



$sql = "INSERT INTO browser (browser, os) VALUES ('" . $user_agent_info['browser_name'] . "', '" . $user_agent_info['os_name'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "Uw browser is opgeslagen";
} else {
    echo "Fout: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT browser, COUNT(*) AS aantal FROM browser GROUP BY browser";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border= 1>";
    echo "<tr><th>Browser</th><th>Aantal</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["browser"]. "</td><td>" . $row["aantal"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Er zijn nog geen browsers opgeslagen";
}

$conn->close();

?>
``       