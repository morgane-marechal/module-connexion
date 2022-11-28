<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" 
        href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Connexion</title>
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
    <body>
    <section id="compte_form">
        <form action="" method="post">
            <h3>Connexion</h3>
            <div id="fullname">
                <input type="text" name="login" id="name" placeholder="Entrez votre login*" required maxlength="255">
            </div>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe*" required maxlength="255">
            </select>
            <input class="submit" type="submit" value="Envoyer">
            <i class="small">* Champs obligatoires</i>
        </form>
    </section>
        <?php 
        include 'dbconnect-connection.php'; // fichier pour les conditions de connection
        ?>

    </body>