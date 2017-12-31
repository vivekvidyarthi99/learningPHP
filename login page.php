<?php
/**
 * Created by PhpStorm.
 * User: VivekXPS
 * Date: 12/30/2017
 * Time: 5:43 PM
 */

include "config.php";
session_start();
$conn = new mysqli($host,$username,$password,$dbname);

if(isset($_POST['Submit']))
{

    $conn = new mysqli($host,$username,$password,$dbname);
    $myusername =mysqli_real_escape_string($conn,$_POST['myusername']);
    $mypass=mysqli_real_escape_string($conn,$_POST['mypass']);

    $sql = "SELECT 'id' FROM login WHERE usern='$myusername' and pass='$mypass'";
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = count($rows,1);

    if($count==1){
        session_start('$username');
        $_SESSION['login_user'] = $myusername;

        header("Location: index.php");
    } else {
        echo "The login you entered is incorrect";
    }

};
?>
<html>
<header>
    <title>
        Login Page
    </title>
</header>
<body>
<h1>Login</h1>
<form method="post">
    <label for="myusername">Username</label>
    <input type="text" name="myusername" id="myusername">
    <label for="pass">Password</label>
    <input type="password" name="mypass" id="mypass">
    <input type="submit" name="Submit" id="submit">
</form>
</body>
</html>
