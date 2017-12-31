<?php
/**
 * Created by PhpStorm.
 * User: VivekXPS
 * Date: 12/30/2017
 * Time: 11:18 AM
 */
include 'header.php';
include 'config.php';

$conn = new mysqli($host,$username,$password,$dbname);

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM mytable WHERE id ='$id'");
    {
        header("Location: database_view.php");
    }
}
?>