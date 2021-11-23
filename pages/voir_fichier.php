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
            if ($Fichier != "." && $Fichier != "..") // Filtre antipoint !<br/>
            {
        ?>
                <section>
                    <table class="tableau"></table>
                    <tr>
                        <td><a href="voir_fichiers.php?nom='<?= '' . $Fichier . '' ?>'">Supprimer</a></td>
                        <td><a href='<?= "" . $adresse . $Fichier . "" ?>' target="_blank"><?= "" . $Fichier . "" ?></a></td>
                        <td>
                            <p>la taille est de'<?= '' . filesize($Fichier) . "" ?>' </p>
                        </td>
                    </tr>
                </section>
        <?php
            }
        }
        closedir($dossier);







        ?>

        </td>
        </tr>
        </table>


</html>
</div>
</body>

</html>