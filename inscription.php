<?php session_start(); ?>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style2.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Inscription</title>
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
    
    <section id="compte_form">
        <form action="" method="post">
            <h3>Création de compte</h3>
            <div id="fullname">
                <input type="text" name="login" id="name" placeholder="Login*" required maxlength="255">
                <input type="text" name="nom" id="name" placeholder="Nom*" required maxlength="255">
                <input type="text" name="prenom" id="firstname" placeholder="Prénom*" required maxlength="255">
            </div>
            <input type="password" name="password" id="password" placeholder="Password*" required maxlength="255">
            <input type="password" name="conf_password" id="conf_password" placeholder="Confirmation du mot de passe*" required maxlength="255">

            </select>
            <input class="submit" type="submit" value="Envoyer">
            <i class="small">* Champs obligatoires</i>
        </form>
    </section>

    <?php     /*----inclu les données de connections avec dbconnect-inscription.php-----------*/
    include 'dbconnect-inscription.php';
    ?>
    </body>



<footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/module-connexion" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <li><a href="inscription.php">S'inscrire</a></li>
                </ul>
</footer>
</body>