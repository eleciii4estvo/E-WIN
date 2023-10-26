<?php
include("path.php");
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
header("location: " . BASE_URL);
