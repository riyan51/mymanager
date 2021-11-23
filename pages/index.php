<?php
session_start();

include("./config.php");

if (isset($_POST['envoi'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        $user = $recupUser->fetch();

        if ($user['id'] != "") {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['adminlevel'] = $adminlevel;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $user['id'];
            header('Location: voir_fichier.php');
        } else
            echo "Mot de passe ou mail invalide";
    } else {
        echo "Veuillez compléter tous les champs";
    }
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/main.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link>
    <title>Mytotool </title>
    <link rel="stylesheet" href="./dist/css/main.min.css">
</head>

<body>
    <div class="accueil">
        <div class="connexion">
            <h1>Mymanager</h1>
            <h2>Connexion</h2>
            <form method="POST">
                <input type="text" class="connexion__info" name="pseudo" placeholder="Votre pseudo">
                <input type="text" class="connexion__info" name="mdp" placeholder="Votre mot de passe">
                <input type="submit" class="connexion__boutton" name="envoi" placeholder="Se connecter">
            </form>
            <a href="#">Mot de passe oublié ?</a><a href="">S'inscrire</a>
        </div>
    </div>

</body>

</html>