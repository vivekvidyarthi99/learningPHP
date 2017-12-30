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
    echo "<table>";
    echo "<p><b>View All</b></p>";
    echo "<tr> <th>ID</th> <th>Item Type</th> <th>Item Title</th> <th>Item Lot</th><th></th><th></th></tr>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr>";

        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['item_type'] . '</td>';
        echo '<td>' . $row['item_title'] . '</td>';
        echo '<td>' . $row['item_lot'] . '</td>';

        echo '<td><a href="manage_items.php?id=' . $row['id'] . '">Edit</a></td>';
        echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
        echo "</tr>";
    }
    echo "</table>";


     ?>

    <p><a href="change.php">Add a new record</a></p>
    <p><a href="index.html">Home</a></p>
</h2>
</body>
</HTML>
