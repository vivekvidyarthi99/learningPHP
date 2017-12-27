<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_testing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mytable";
$result = mysqli_query($conn,$sql);
#$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
#$string = implode(", ", $row);

?>
<HTML>
<header>
    <title>
        PrintPage
    </title>

</header>
<body>
<h1>
    Print Page
</h1>
<h2>
    <?php
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo $row['item_type'];
        echo ", ";
        echo $row['item_title'];
        echo ", ";
        echo $row['item_lot'];
        echo "\r\n";
    };


     ?>
</h2>
</body>
</HTML>
