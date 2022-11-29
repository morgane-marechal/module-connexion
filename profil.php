<?php session_start();
?>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style2.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Home</title>
</head>

<body>
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
    <div id=welcome>
        <h1>Bienvenue <?php echo $_SESSION['login'] ?></h1>
    </div>
    <h1>Profil</h1>
    <div id="content-profil">
        <div id="bloc-text">
            <div id="test-php">
                <?php 
                    echo "<h2>Hello ".$_SESSION['login']." !</h2>";
                    echo "<br>";
                    echo var_dump($_SESSION);
                    echo "<br>";

                    // ----$_session pour afficher nombre de visite-----
                    if(isset($_SESSION["nbvisites"])) {
                        $_SESSION['nbvisites']++;
                    }else{
                        $_SESSION['nbvisites']=1;
                    }
                    echo "Nombre de de fois où vous vous êtes connecté à cette page: ".$_SESSION['nbvisites'];
                    $newlogin=$_SESSION['login'];
                    $mysqli=new mysqli('localhost', 'root', '', 'moduleconnexion');
                    $request=$mysqli->query("SELECT * FROM utilisateurs where login = '$newlogin'");
                    $result=$request->fetch_all();
                    echo "<br>".var_dump($result);
                    echo $result[0][1]."<br>";
                    echo $result[0][2]."<br>";
                    echo $result[0][3]."<br>";
                    echo $result[0][4]."<br>";
                    ?>
            </div>


        </div>

        <div id="bloc-form">
            <h2>Voulez-vous faire des mofifications de vos données de profil ?</h2>
            <section id="compte_form">
                <form id="profil-form" action="" method="post">
                    <h3>Modification du compte</h3>
                    <div id="fullname">
                        <input type="text" name="login" id="login" placeholder= <?php echo $result[0][1]; ?> required maxlength="255">
                        <input type="text" name="nom" id="name" placeholder=<?php echo $result[0][2]; ?> required maxlength="255">
                        <input type="text" name="prenom" id="firstname" placeholder=<?php echo $result[0][3]; ?> required maxlength="255">
                    </div>
                    <input type="text" name="password" id="password" placeholder= <?php echo $result[0][4]; ?> required maxlength="255">
                    <input type="text" name="conf_password" id="conf_password" placeholder="Confirmation du nouveau mot de passe*" required maxlength="255">

                    </select>
                    <input class="submit" type="submit" value="Modifier">
                    <i class="small">* Mofidier le champs que vous voulez changer</i>
                </form>
            </section>
        </div>
    </div>


    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/module-connexion" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <li><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>

</body>