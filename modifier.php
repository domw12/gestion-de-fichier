<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php

     // conexion a la base de donnee
     include_once "conexion.php";
    //on recupere le id dans le lien
    $id = $_GET['id'];


     //requete pour afficher les infos d'un employer
     $req = mysqli_query($con ,"SELECT * FROM Employer WHERE id = $id");

        $row = mysqli_fetch_assoc($req);





    // verifier que le boutton ajouter a ete bien cliquer
    if(isset($_POST['button'])){
       //extraction des informations envoyer dans les variables par la methode POST
       extract($_POST);
       //verifier que tous les champs ont ete remplis
       if(isset($nom) && isset($prenom) && $age){
        // requete de modification
        $req = mysqli_query($con , "UPDATE employer SET nom =' $nom ', prenom = '$prenom ', age = '$age' WHERE id = $id");
       
        if($req){// si la requete a ete effectuer avec succes , on fait une redirection 
            header("location: index.php");
        }else{// si non
            $message = "employer non ajouter";
        }

       }else{
        // si non
        $message = "veillez remplir tous les champs !";
       }
    }
    
    
    ?>      
















    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png" alt="">Retour</a>
        <h2>Modifier l'employer: <?=$row['nom']?> </h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            
            ?>
        </p>
        <form action="index.php" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label> Prenom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>Age</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <input type="submit" value="modifier" name="boutton">




        </form>
    </div>
</body>
</html>