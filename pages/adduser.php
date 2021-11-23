<?php

session_start();
if (!$_SESSION['pseudo']) {
    header('Location: connectadmin.php');
}





include("./config.php");



if (isset($_POST['send'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp']) and !empty($_POST['adminlevel'])) {
        $pseudo = ($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $adminlevel = ($_POST['adminlevel']);
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp, adminlevel)VALUES (?, ?, ?)');
        $insertUser->execute(array($pseudo, $mdp, $adminlevel));

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ? AND adminlevel = ?');
        $recupUser->execute(array(['pseudo, mdp, adminlevel']));
        if ($recupUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['adminlevel'] = $adminlevel;
            header("Location : ./user.php");
        }
    } else {
        echo " Merci de remplir tous les champs...";
    }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/mainadmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./dashboard/main.css">
    <title>Document</title>
</head>

<body>

    <?php include("../components/navbaradmin.php") ?>
    <form class="jspcommesa" action="" id="" method="POST">
        <section id="commandes">
            <h1>Ajouter un nouvelle utilisateur</h1>
            <!-- Barre retour et tri -->
            <div class="flex" style="justify-content: space-between;">
                <a href="./user.php" class="btn"><i class="fas fa-chevron-left"></i> Retour</a>
            </div>

            <!-- INFORMATIONS GENERALES  -->
            <h1>Informations générales</h1>

            <h4>Pseudo</h4>
            <input type="text" name="pseudo" class="input" />

            <h4>Mot de passe</h4>
            <input type="text" name="mdp" class="input" />

            <h4>Level Admin</h4>
            <input type="text" name="adminlevel" class="input" />

            <input class="bouton" type="submit" name="send" value="Ajouter">

        </section>
    </form>
</body>

</html>