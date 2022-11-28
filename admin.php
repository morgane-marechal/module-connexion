<?php
     $mysqli = new mysqli('localhost','root','','moduleconnexion');
    
     /*
     if($connection->connect_error){
         die('Erreur : ' .$connection->connect_error);
     }
     echo 'Connexion réussie';
     */
 
     if(!$mysqli){
         die('Erreur : ' .mysqli_connect_error());
     }
     echo 'Connexion réussie!';
 
     $request=$mysqli->query("SELECT * FROM utilisateurs");
     $result_fetch_all = $request->fetch_all();
    
     //var_dump($result_fetch_all);
?>


<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" 
        href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Page admin</title>
</head>


<header>
    <nav>
                        <ul class="navigationList">
                              <li><a href="index.php">Accueil</a></li>
                              
                                <li class="menuDeroulant">
                                <a href="#" class="navLink">Formulaire de connexion</a>
                                <ul class="sousMenu">
                                    <li><a href="connexion.php">Se connecter</a></li>
                                    <li><a href="inscription.php">S'inscrire</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
</header>
<h1> Bienvenue sur la page d'administration </h1>
<h2>Retrouvez toutes les informations des utilisateurs du site</h2>
    <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Login</td>
                    <td>Prenom</td>
                    <td>Nom</td>
                    <td>Mot de passe</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($result_fetch_all as $ligne){
                echo "<tr>";
                    foreach($ligne as $valeur){
                    echo "<td>";
                    echo $valeur;
                    echo "</td>";
                    }
                echo "</tr>";
    }
            ?>
            </tbody>
        </table

