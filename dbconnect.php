<?php
   $mysqli = new mysqli('localhost','root','','moduleconnexion'); /*connexion avec la base de donnée -> rajouter de nouveau utilisateurs*/
   if($mysqli->connect_error){
       die('Erreur : ' .$mysqli->connect_error);
   }
   echo 'Connexion réussie'; /*vérifie connexion avec base de donnée*/   
   
   $login=$_POST['login'];
   $firstname=$_POST['prenom'];
   $name=$_POST['nom'];
   $password=$_POST['password'];
   $checkpassword=$_POST['conf_password'];
   echo $login;
   echo $firstname;
   echo $name;
   echo $password;
   echo "<br>";

    if ($password==$checkpassword){
         $newuser = "INSERT INTO utilisateurs ( login, prenom, nom, password)
        VALUES( '$login', '$firstname', '$name', '$password')";

        if ($mysqli->query($newuser) === TRUE) {
            echo "les nouveaux enregistrements ajoutés avec succés";
            } else {
            echo "Erreur: " . $newuser . "
            " . $mysqli->error;
            }
    }else{
        echo "Veuillez confirmer correctement votre mot de passe!"; 
    }
       
     
     $mysqli->close();
   ?>  
?>