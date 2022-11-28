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

     //------------------------code pour le formulaire de connexion --------------------------
   
     if(isset($_POST['login']) && isset($_POST['password'])){
        if($login !== "" && $password !== ""){
            $requete = "SELECT count(*) FROM utilisateurs where login = '$login' and password= '$password'";
            $exec_requete = mysqli_query($mysqli,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
                if($count!=0 && $login=="admin" && $password=="admin"){
                    echo "Bravo vous êtes connectés en mode administrateur!";
                    header('Location: http://localhost/module-connexion/admin.php'); // <- redirection vers la page admin
                    exit();
        
                }elseif($count!=0) // login et mot de passe correctes
                {
                    echo "Bravo vous êtes connectés!";
                //$_SESSION['username'] = $username;
                //header('Location: principale.php');
                }
                else
                {
                echo "Utilisateur ou mot de passe incorrect!";
                }
            }
        }
            mysqli_close($mysqli);
            
        
?>  
