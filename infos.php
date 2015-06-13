<?php
include('inc/init.php');
if($_POST) {
    $pseudo = $_POST['pseudo'];
    $req_selectInfo = $connexion->prepare('SELECT * FROM players WHERE name= :name');
    $req_selectInfo->execute(array(
       'name' => $pseudo 
    ));
    $nbr_selectInfo = $req_selectInfo->rowCount();
    $selectInfo = $req_selectInfo->fetch();
    if($nbr_selectInfo > 0) {
        $name = $selectInfo['name'];
        $playerid = $selectInfo['playerid'];
        $cash = $selectInfo['cash'];
        $bankacc = $selectInfo['bankacc'];
        $coplevel = $selectInfo['coplevel'];
        $mediclevel = $selectInfo['mediclevel'];
        $adminlevel = $selectInfo['adminlevel'];
        $donatorlevel = $selectInfo['donatorlvl'];
        $blacklist = $selectInfo['blacklist'];
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Joueur: <?php echo $name; ?></title>
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
            <div class="info_box">
                <center>Information du joueur: <b><?php echo $name; ?></b></center><hr>
                Pseudonyme en jeu: <span class="label label-success"><?php echo $name; ?></span><br>
                ID Joueur Steam: <span class="label label-success"><?php echo $playerid; ?></span><br>
                Portefeuille: <span class="label label-success"><?php echo number_format($cash); ?>$</span><br>
                Argent en banque: <span class="label label-success"><?php echo number_format($bankacc); ?>$</span><br>
                <?php
                if($coplevel > 0 ) {
                    echo 'Policier: <span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span> <span class="label label-success">'.$coplevel.'</span><br>';
                } else {
                    echo 'Policier: <span class="label label-danger"><span class="glyphicon glyphicon-remove"></span></span> <span class="label label-danger">'.$coplevel.'</span><br>';
                }
                if($mediclevel > 0 ) {
                    echo 'Médecin: <span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span> <span class="label label-success">'.$mediclevel.'</span><br>';
                } else {
                    echo 'Médecin: <span class="label label-danger"><span class="glyphicon glyphicon-remove"></span></span> <span class="label label-danger">'.$mediclevel.'</span><br>';
                }
                if($adminlevel > 0 ) {
                    echo 'Admin: <span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span> <span class="label label-success">'.$adminlevel.'</span><br>';
                } else {
                    echo 'Admin: <span class="label label-danger"><span class="glyphicon glyphicon-remove"></span></span> <span class="label label-danger">'.$adminlevel.'</span><br>';
                }
                if($donatorlevel > 0 ) {
                    echo 'Donateur: <span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span> <span class="label label-success">'.$donatorlevel.'</span><br>';
                } else {
                    echo 'Donateur: <span class="label label-danger"><span class="glyphicon glyphicon-remove"></span></span> <span class="label label-danger">'.$donatorlevel.'</span><br>';
                }
                if($blacklist > 0 ) {
                    echo 'Blacklist: <span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span><br>';
                } else {
                    echo 'Blacklist: <span class="label label-danger"><span class="glyphicon glyphicon-remove"></span></span><br>';
                }
                ?>
            </div>
        </body>
    </html>
    
<?php 
    } else {
        header('location: index.php?erreur=not_exist');
    }
} else {
    header('location: index.php');
}
?>