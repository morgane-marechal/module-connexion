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
            <li><a href="index.php">Se déconnecter</a></li>
        </ul>
    </nav>
    </header>
    <div id=welcome>
        <h1>Bienvenue <?php echo $_SESSION['login'] ?></h1>
    </div>
    <div id="content-profil">
        <div id="bloc-text">
            <div id="test-php">
                <?php 
                    echo "<h2>Hello ".$_SESSION['login']." !</h2>";
                    echo "<br>";
                    //echo var_dump($_SESSION);
                    echo "<br>";

                    // ----$_session pour afficher diff données-----
                    $newlogin=$_SESSION['login'];
                    $mysqli=new mysqli('localhost', 'root', '', 'moduleconnexion');
                    $request=$mysqli->query("SELECT * FROM utilisateurs where login = '$newlogin'");
                    $result=$request->fetch_all();
                    
                    echo "<br>".var_dump($result);
                    
                    //pour voir ce qu'il y a dans le tableau
                    echo $result[0][1]."<br>";
                    echo $result[0][2]."<br>";
                    echo $result[0][3]."<br>";
                    echo $result[0][4]."<br>";
                    echo "Mot de passe en clair : ".$_SESSION['password'];
                    echo"<br>";

                    //pour avoir version nom cripté du mot de passe
                    password_verify($password_post, $password_hash);

                echo "Voir si tout va bien ...";
                

                    ?>


            </div>


        </div>

        <div id="bloc-form">
            <h2>Voulez-vous faire des mofifications de vos données de profil ?</h2>
            <section id="compte_form">
                <form id="profil-form" action="" method="post" autocomplete="off">
                    <h3>Modification du compte</h3>
                    <div id="fullname">
                        <input type="text" name="newlogin" id="login" placeholder= "<?php echo $result[0][1]; ?>" maxlength="255">
                        <input type="text" name="newnom" id="name" placeholder="<?php echo $result[0][3]; ?>" maxlength="255">
                        <input type="text" name="newprenom" id="firstname" placeholder="<?php echo $result[0][2]; ?>" maxlength="255">
                    </div>
                    <input type="password" name="newpassword" id="password" placeholder= "<?php echo $_SESSION['password']; ?>" maxlength="255">
                    <input type="password" name="newconf_password" id="conf_password" placeholder="<?php echo $_SESSION['password']; ?>" maxlength="255">

                    </select>
                    <input class="submit" type="submit" value="Modifier">
                    <i class="small">* Mofidier le champs que vous voulez changer, un seul champs à la fois.</i>
                </form>
            </section>
        </div>
    </div>
    <?php
                        if ($_POST['newlogin']){
                            echo "Changement de login";
                            $changelogin=$_POST['newlogin'];
                            $sqllogin = "update utilisateurs set login = '$changelogin' where login = '$newlogin'";
                            $rs = mysqli_query($mysqli,$sqllogin);
                        }elseif($_POST['newnom']){
                            $newnom=$_POST['newnom'];
                            echo "Changement de nom en: ".$newnom." où le login est: ".$newlogin;
                            $sqlNom = "update utilisateurs set nom = '$newnom' where login = '$newlogin'";
                            $rs = mysqli_query($mysqli,$sqlNom);
                            
                        }elseif ($_POST['newprenom']){
                            $newprenom=$_POST['newprenom'];
                            echo "Changement du prénom en: ".$newprenom;
                            $sqlprenom = "update utilisateurs set prenom = '$newprenom' where login = '$newlogin'";
                            $rs = mysqli_query($mysqli,$sqlprenom);
                        }elseif (($_POST['newpassword']) && ($_POST['newconf_password']) && (($_POST['newpassword']) == ($_POST['newconf_password'])) ){
                            echo "Changement de MP";
                            $newpassword=$_POST['newpassword'];
                            $newsecurepassword = password_hash($newpassword, PASSWORD_DEFAULT);
                            $sqlpassword = "update utilisateurs set password = '$newsecurepassword' where login = '$newlogin'";
                            $rs = mysqli_query($mysqli,$sqlpassword); 
                        }
    ?>

    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/module-connexion" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li><a href="connexion.php">Se connecter</a></li>
                    <li><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>

</body>