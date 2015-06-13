<?php
$date = date('d/m/Y');
$heure = date('H:i');

session_start();
header("Content-Type: text/html; charset=utf-8");

function connect() {
    if(empty($_SESSION['session'])) {
        return false;
    } else {
        return true;
    }
}

function preint_r($array)
{
echo '<pre>';
print_r($array);
echo '</pre>';
}


$host_db = "localhost";
$db_db = "arma3life";
$user_db = "root";
$password_db = "votre_mot_de_passe";

    try {
    $connexion = new PDO('mysql:host='.$host_db.';dbname='.$db_db.'; charset=utf8', $user_db, $password_db, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (PDOException $e) {
        echo '<center>Un problème est survenu, impossible de se connecter à la base de donnée.<br><i>Vérifier le fichier init.php situé dans le dossier inc</i> </center>';
        die;
    }

