<?php
require_once './connect.php';

$idD = $_GET['idD'];
$requette = "DELETE FROM products WHERE id = " . $idD;
mysqli_query($conn, $requette);
header('Location:../home.php');
