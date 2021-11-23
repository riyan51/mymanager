<?php

include("./config.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $req = $bdd->prepare("DELETE FROM `users` WHERE id = $id");
    if ($req->execute()) {
        header("Location: ./user.php");
    } else {
        echo "Erreur lors de la suppression de l'utilisateur avec l'id: $id";
    }
}
