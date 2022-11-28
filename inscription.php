<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" 
        href="style.css" />
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
    <body>

    <?php
        $mysqli = new mysqli('localhost','root','','utilisateurs'); /*connexion avec la base de donnée -> rajouter de nouveau utilisateurs*/
          
        if($connection->connect_error){
            die('Erreur : ' .$connection->connect_error);
        }
        echo 'Connexion réussie'; /*vérifie connexion avec base de donnée*/    
    ?> 
    <section id="compte_form">
        <form method="post" action="traitement.php">
            <h3>Création de compte</h3>
            <div id="fullname">
                <input type="text" name="login" id="name" placeholder="Login*" required maxlength="255">
                <input type="text" name="name" id="name" placeholder="Nom*" required maxlength="255">
                <input type="text" name="firstname" id="firstname" placeholder="Prénom*" required maxlength="255">
            </div>
            <input type="password" name="password" id="password" placeholder="Password*" required maxlength="255">
            <input type="password" name="conf_password" id="conf_password" placeholder="Confirmation du mot de passe*" required maxlength="255">

            </select>
            <input class="submit" type="submit" value="Envoyer">
            <i class="small">* Champs obligatoires</i>
        </form>
    </section>
    </body>

</body>