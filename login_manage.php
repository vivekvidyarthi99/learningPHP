<?php
include "config.php";
include "common.php";
include "session.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login ";
$result = mysqli_query($conn,$sql);


#$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
#$string = implode(", ", $row);

?>
<HTML>
<header>
    <title>
        Login Management
    </title>

</header>
<body>
<h1>
    Change Login
</h1>
<h2>
    <?php
    echo "<table>";
    echo "<p><b>View All</b></p>";
    echo "<tr> <th>Username</th> <th>Password</th> <th></th></tr>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<tr>";

        echo '<td>' . $row['usern'] . '</td>';
        echo '<td>' . $row['pass'] . '</td>';


        echo '<td><a href="edit_login.php?usern=' . $row['usern'] . '">Edit</a></td>';
        echo "</tr>";
    }
    echo "</table>";


    ?>


    <p><a href="index.php">Home</a></p>
</h2>
</body>
</HTML>
