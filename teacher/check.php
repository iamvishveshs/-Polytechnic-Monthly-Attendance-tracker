<?php
session_start();
require("db.php");
if(!isset($_SESSION["teacherId"]))
{
    header("Location:../login");
}
?>