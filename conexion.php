<?php
//conexion a la base de donnees//
$con = mysqli_connect("localhost","root","","entreprise");
if (!$con) {
    echo "vous n'etes pas connecter a la base donnee";
}

?>