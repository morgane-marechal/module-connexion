<?php session_start();
     include 'db-connect.php';
    
     /*
     if(!$mysqli){
         die('Erreur : ' .mysqli_connect_error());
     }
     echo 'Connexion réussie!';*/
     $request=$mysqli->query("SELECT * FROM utilisateurs");
     $result_fetch_all = $request->fetch_all();
     //var_dump($result_fetch_all);
?>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" 
        href="style2.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Page admin</title>
</head>

<body>
<header>
    <nav>
        <ul class="navigationList">
            <li><a href="index.php">Se déconnecter</a></li>
        </ul>
    </nav>
</header>
<div id=welcome>
        <h1>Bienvenue <?php echo $_SESSION['login'] ?></h1>
    </div>
<div id="content">
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
                <?php 
                    foreach($result_fetch_all as $ligne){
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
        </table>
</div>

    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/module-connexion" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <li><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>
</body>

