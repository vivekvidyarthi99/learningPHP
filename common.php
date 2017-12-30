<?php
/**
 * Created by PhpStorm.
 * User: VivekXPS
 * Date: 12/25/2017
 * Time: 11:47 PM
 */
function escape($html)
{
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
function db_prepare_input($string) {
    return trim(addslashes($string));
}
?>