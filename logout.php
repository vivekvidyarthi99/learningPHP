<?php
/**
 * Created by PhpStorm.
 * User: VivekXPS
 * Date: 12/30/2017
 * Time: 7:28 PM
 */
session_start();
if(session_destroy()){
    header("Location: login page.php");
}