<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des fichiers</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containers">
         
    </div>

    <div class="container">
   
        <a href="ajouter.php" class="Btn_add"><img src="images/plus.jpg" alt="">Ajouter un fichier</a>
    
        <table>
           <tr id="items">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Modifier</th>
            <th>Supprimer</th>
           </tr> 

           <?php
    
           //inclure la page de conexion
             include_once "conexion.php";
             // requets pour afficher la liste de employees
             $req = mysqli_query($con , "SELECT * FROM Employer");
             if(mysqli_num_rows($req) == 0){
                //s'il n'existe pas d'employee dans la base de donner, alors on affiche ce message:
                echo "il y'a pas encore d'employee ajouter!";
             }else {
                //si non , affichons la liste de tout les employees
                while($row=mysqli_fetch_assoc($req)){
             
            ?>
                    <tr>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><?=$row['age']?></td>
             <!--nous allons mettre l'id de chaque employe dans ce lien-->
                <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png" alt=""></a></td>
                <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png" alt=""></a></td>
                    </tr>
            
                <?php

                }

                

                }

                ?>
 </table>
    </div>
    
</body>
</html>