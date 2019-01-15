<?php 
session_start();
session_destroy();

include('../includes/functions.php');

header("location: /admin/login.php");