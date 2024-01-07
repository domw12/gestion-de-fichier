<?php
//conexion a la base de donnees

include_once "conexion.php";
// recuperation de l'id dans le lien
$id= $_GET['id'];
//requet de suppression
$req = mysqli_query($con , "DELETE FROM employer WHERE id = $id");
// redirection vers la page index.php
header("location:index.php")







?>