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


   $_SESSION['login'] = $login;
   $_SESSION['prenom'] = $firstname;
   $_SESSION['nom'] = $name;
   $_SESSION['password'] = $password;



   
   
   /*echo $login;
   echo $firstname;
   echo $name;
   echo $password;
   echo "<br>";*/

     //------------------------code pour le formulaire de connexion --------------------------
   
     if(isset($_POST['login']) && isset($_POST['password'])){
        if($login !== "" && $password !== ""){
            $password_post=$_POST['password'];
            $request=$mysqli->query("SELECT * FROM utilisateurs where login = '$login'");
            $result=$request->fetch_all();
            $password_hash=$result[0][4]; // <-retrouve mot de passe crypté
            //echo $password_hash; // <- pour verifier si la variable est bonne
            if (password_verify($password_post, $password_hash)) {
                $requete = "SELECT count(*) FROM utilisateurs where login = '$login' and password= '$password_hash'"; //recherche si login et password cripté existe
                $exec_requete = mysqli_query($mysqli,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];
                    if($count!=0 && $login=="admin" /*&& $password_post=="admin"*/){
                        echo "Bravo vous êtes connectés en mode administrateur!";
                        header('Location: http://localhost/module-connexion/admin.php'); // <- redirection vers la page admin
                        exit();
            
                    }elseif($count!=0) // login et mot de passe correctes
                    {
                        echo "Bravo vous êtes connectés!";
                        $_SESSION['login'] = $login;
                        $_SESSION['prenom'] = $firstname;
                        $_SESSION['nom'] = $name;
                        $_SESSION['password'] = $password_post;
                        header('Location: http://localhost/module-connexion/profil.php'); // <- redirection vers la page admin
                        exit();
                    //$_SESSION['username'] = $username; 
                    //header('Location: principale.php');
                    }
                    else
                    {
                    echo "Utilisateur ou mot de passe incorrect!";
                    }
                }
            }
        }
            mysqli_close($mysqli);
            
        
?>  
