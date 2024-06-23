<?php
session_start();

require("db.php");
/*Checking if there is any admin session if no then redirected to login page*/
if(!isset($_SESSION["adminId"]))
{
    header("Location:../login");
}
?>