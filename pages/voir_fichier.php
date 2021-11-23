<?php

session_start();
if (!$_SESSION['pseudo']) {
    header('Location: index.php');
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/mainadmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php include("../components/navbaradmin.php") ?>

<body>
    <div class="eltableau">
        <?php
        $adresse = "../fichiers/";
        $dossier = Opendir($adresse);
        while ($Fichier = readdir($dossier)) {
            if ($Fichier != "." && $Fichier != "..") {
        ?>
                <table class="tableau">
                    <tr class="nomcat">
                        <td>action</td>
                        <td>Mot de passe</td>
                        <td>Date création</td>
                    </tr>
                    <tr>
                        <td><a href="voir_fichiers.php?nom=<?= "" . $Fichier . "" ?>">Supprimer</a></td>
                        <td><a href=<?= "" . $adresse . $Fichier . "" ?> target="_blank">'<?= "" . $Fichier . "" ?></a></td>
                        <td></td>
                    </tr>
            <?php

            }
        }
        closedir($dossier);


            ?>

            </td>
            </tr>
                </table>

</body>

</html>
</div>
</body>

</html>