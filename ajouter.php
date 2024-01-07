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
    // verifier que le boutton ajouter a ete bien cliquer
    if(isset($_POST['button'])){
       //extraction des informations envoyer dans les variables par la methode POST
       extract($_POST);
       //verifier que tous les champs ont ete remplis
       if(isset($nom) && isset($prenom) && $age){

        // conexion a la base de donnee
        include_once "conexion.php";
        $req = mysqli_query($con ,"INSERT INTO Employer VALUES(NULL, '$nom', '$prenom','$age')");
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
        <h2>Ajouter un fichier</h2>
        <p class="erreur_message">
            veillez remplir tous les champs!
            <?php
            // si la variable message existe ajoutons son contenue
            if(isset($message)){
                echo "message";
            }
            
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom du fichier</label>
            <input type="text" name="nom">
            <label> fichier</label>
            <input type="file" name="prenom">
            <label>Age</label>
            <input type="number" name="age">
            <input type="submit" value="Ajouter" name="button">




        </form>
    </div>
</body>
</html>