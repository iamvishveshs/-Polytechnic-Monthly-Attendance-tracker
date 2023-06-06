<?php
session_start();
require("db.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
if(!isset($_SESSION["CteacherId"]))
{
    header("Location:../login");
}
?>