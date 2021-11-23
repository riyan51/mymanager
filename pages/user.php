<?php
session_start();
if (!$_SESSION['pseudo']) {
    header('Location: connectadmin.php');
}


include("./config.php");

$sql = "SELECT * FROM users";
$req = $bdd->prepare($sql);

if ($req->execute()) {
    $utilisateurs  = $req->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mainadmin.css">

    <script src="https://kit.fontawesome.com/9cae3cc48a.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>


<?php include("../components/navbaradmin.php") ?>


<body>


    <section class="" id="clients">
        <h1>les utilisateurs</h1>

        <!-- Barre retour et tri -->
        <div class="flex" style="justify-content: space-between;">
            <a href="./indexadmin.php" class="btn"><i class="fas fa-chevron-left"></i> Retour</a>
            <?php
            if (($_SESSION['pseudo']) == 'eric') { ?>
                <a href="./adduser.php" class="btn"><i class="fas fa-chevron-left"></i>Ajouter un utilisateur</a>
            <?php
            } else {
            ?>

            <?php
            }
            ?>
            <a class="btn">Trier <i class="fas fa-chevron-down"></i></a>
        </div>
        <section id="dashboard">
            <!-- Moteur de recherche -->

            <section class="afficher_all">



            </section>
            <!-- Liste des clients -->
            <table class="tableau">
                <tr class="nomcat">
                    <td>Nom Prénom</td>
                    <td>Mot de passe</td>
                    <td>Level admin</td>
                </tr>
                <?php
                foreach ($utilisateurs as $u) { ?>
                    <tr>
                        <?= "<td>" . $u["pseudo"] . "</td>" ?>
                        <?= "<td>" . $u["mdp"] . "</td>" ?>
                        <?= "<td>" . $u["adminlevel"] . "</td>" ?>
                        <?php
                        if (($_SESSION['pseudo']) == 'eric') { ?>
                            <?= "<td> <a><i></i></a> <a href='./deleteuser.php?id=" . $u["id"] . "'><i class='fas fa-trash-alt'></i></a></td>" ?>
                        <?php
                        } else {
                        ?>

                        <?php
                        }
                        ?>

                    </tr>
                <?php } ?>
            </table>
        </section>




</body>

</html>