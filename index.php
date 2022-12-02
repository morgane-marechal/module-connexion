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
        <div id="content">
           
            <h1>Bienvenue sur notre super site !</h1>
            <?php
                //include 'dbconnect-connection.php'; // fichier pour les conditions de connection
            ?>


            

        </div>
    

    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/module-connexion" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <li><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>

</body>