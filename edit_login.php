<?php
include 'header.php';
include 'config.php';
include "session.php";
$myusername = $_GET['usern'];



$conn = new mysqli($host,$username,$password,$dbname);
$sql = "SELECT * FROM login WHERE lid = '1'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>
<?php
if (isset($_POST['Submit']))
{

    $myusername = $_GET['usern'];

    $newusername = htmlspecialchars($_POST['newusername']);
    $newpass = htmlspecialchars($_POST['newpassword']);



    mysqli_query($conn,
        "UPDATE login SET usern='$newusername', pass='$newpass'WHERE lid = 1");
    echo "Login Changed Successfully";


};
?>
    <p>Edit Login</p>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div>
            <p><strong>Username:</strong><?php echo $myusername; ?></p>

            <strong>Username: </strong> <input type="text" name="newusername" value="<?php echo $row['usern']; ?>"/><br/>

            <strong>Password: </strong> <input type="text" name="newpassword" value="<?php echo $row['pass']; ?>"/><br/>
            <input type="submit" name="Submit" value="Submit">


        </div>
    </form>

    <p><a href="login_manage.php">View Login</a> </p>
    <p><a href="index.php">Home</a> </p>

<?php
include 'footer.php';
?>

<?php
include 'config.php';
?>