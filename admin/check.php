<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
require("db.php");
/*Checking if there is any admin session if no then redirected to login page*/
if(!isset($_SESSION["adminId"]))
{
    header("Location:../login");
}
?>