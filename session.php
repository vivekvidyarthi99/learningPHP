<?php
/**
 * Created by PhpStorm.
 * User: VivekXPS
 * Date: 12/31/2017
 * Time: 12:06 AM
 */

include "config.php";
session_start();
$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn,
    "SELECT usern FROM login WHERE usern= '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['usern'];
if(!isset($_SESSION['login_user'])){
    header("Location:login page.php");
}
