<?php
include('inc/init.php');
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>AltisInfo - v1.1</title>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <meta charset="utf-8" type="text/html">
        </head>
        <body class="body">
            <center>
                <br>
                    <a href="index.php"><img src="/images/header.png"></a>
                <br>
            </center>
            <center>
                <br>
                    <span class="alert alert-info">
                        Pour trouver les informations sur un joueur, veuillez utilisez la liste déroulante ci-dessous, répertoriant la totalité des joueurs du serveur.<span class="glyphicon glyphicon-chevron-down"></span>
                    </span>
                <br>
            </center>
            <br>
            <br>
            <center>
                <form method="post" action="infos.php">
                    <select class="drop" name="pseudo">
                        <?php
                        $req_selectPlayers = $connexion->query('SELECT * FROM players ORDER BY name ASC');
                        $nbr_selectPlayers = $req_selectPlayers->rowCount();
                        if($nbr_selectPlayers > 0) {
                            while($selectPlayers = $req_selectPlayers->fetch()) {
                        ?>
                        <option value="<?php echo $selectPlayers['name']; ?>"><?php echo $selectPlayers['name']; ?></option>
                        <?php
                            }
                        } else {
                        ?>
                        <option value="Rien">Il n'y à aucun joueur d'inscrit</option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-info" value="Voir les informations">
                </form>
            </center>
        </body>
    </html>