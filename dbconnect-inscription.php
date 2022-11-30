<?php session_start();
    //connection avec la base de donnée
   $mysqli = new mysqli('localhost','root','','moduleconnexion'); /*connexion avec la base de donnée -> rajouter de nouveau utilisateurs*/
   if($mysqli->connect_error){
       die('Erreur : ' .$mysqli->connect_error);
   }
   echo '<b>Connexion réussie avec la base de donnée (à retirer ensuite)</b><br>'; /*vérifie connexion avec base de donnée*/   

   //création de variable
   $login = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['login'])); //protection pour éviter injection SQL malveillante
   $firstname = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['prenom'])); //protection pour éviter injection SQL malveillante
   $name = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['nom'])); //protection pour éviter injection SQL malveillante
   $password = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['password'])); 
   $checkpassword = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['conf_password'])); //protection pour éviter injection SQL malveillante
   
   $_SESSION['login'] = $login;
   $_SESSION['prenom'] = $firstname;
   $_SESSION['nom'] = $name;
   $_SESSION['password'] = $password;
   $id_session = session_id();
   /*echo $login;
   echo $firstname;
   echo $name;
   echo $password;
   echo "<br>";*/

   //-------------------- code pour le formulaire d'inscription ----------------
   $check_login = "SELECT count(*) FROM utilisateurs where login = '$login'";
            $exec_requete = mysqli_query($mysqli,$check_login);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
    if ($count==1){
        $error_login="<p>Ce login est déjà pris, veuillez en choisir un autre!</p>";
    }else{
    if (($password==$checkpassword) && (!empty($name)) && (!empty($firstname)) && (!empty($password))){
            $password = password_hash($password, PASSWORD_DEFAULT); 
            $newuser = "INSERT INTO utilisateurs ( login, prenom, nom, password)
            VALUES( '$login', '$firstname', '$name', '$password')";

            if ($mysqli->query($newuser) === TRUE) {
                //echo "Vous avez ajouté un utilisateur avec succés";
                header('Location: http://localhost/module-connexion/connexion.php'); // <- redirection vers la page connexion si l'inscription fonctionne
                exit();
                } else {
                echo "Erreur: " . $newuser . "
                " . $mysqli->error;
                }
        }elseif ((empty($name)) OR (empty($firstname)) OR (empty($password))){
            $error_empty="L'un des champs du formulaire est vide";
            echo $error_empty;
        }elseif ($password!=$checkpassword){
            $error_password="Veuillez confirmer correctement votre mot de passe!";
            echo $error_password;
        }
    }
     $mysqli->close();
   
   ?>  
