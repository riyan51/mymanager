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
        $scandir = scandir("../fichiers");
        foreach ($scandir as $fichier) {
            echo "$fichier<br/>";
        }
        ?>

</body>

</html>
</div>
</body>

</html>