<?php

    //connection avec la base de donnée
   $mysqli = new mysqli('localhost','root','','moduleconnexion'); /*connexion avec la base de donnée -> rajouter de nouveau utilisateurs*/
   if($mysqli->connect_error){
       die('Erreur : ' .$mysqli->connect_error);
   }
   echo '<b>Connexion réussie avec la base de donnée (à retirer ensuite)</b><br>'; /*vérifie connexion avec base de donnée*/   

   //création de variable
   $login=$_POST['login'];
   $firstname=$_POST['prenom'];
   $name=$_POST['nom'];
   $password=$_POST['password'];
   $checkpassword=$_POST['conf_password'];
   
   /*echo $login;
   echo $firstname;
   echo $name;
   echo $password;
   echo "<br>";*/

   //-------------------- code pour le formulaire d'inscription ----------------
    if (($password==$checkpassword) && (!empty($name)) && (!empty($firstname)) && (!empty($password))){
         $newuser = "INSERT INTO utilisateurs ( login, prenom, nom, password)
        VALUES( '$login', '$firstname', '$name', '$password')";

        if ($mysqli->query($newuser) === TRUE) {
            echo "Vous avez ajouté un utilisateur avec succés";
            header('Location: http://localhost/module-connexion/connexion.php'); // <- redirection vers la page connexion si l'inscription fonctionne
            exit();
            } else {
            echo "Erreur: " . $newuser . "
            " . $mysqli->error;
            }
    }elseif ((empty($name)) OR (empty($firstname)) OR (empty($password))){
        echo "L'un des champs du formulaire est vide";
    }elseif ($password!=$checkpassword){
        echo "Veuillez confirmer correctement votre mot de passe!"; 
    }
     $mysqli->close();



   
   
   
   ?>  
