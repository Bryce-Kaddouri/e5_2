<?php

switch ($_REQUEST['action']) {
    case 'tabScore': {

            $date1 = new DateTime('now', new DateTimeZone('Indian/Reunion'));
            $date2 = new DateTime('2022-11-16 17:30:00', new DateTimeZone('Indian/Reunion'));
            $interval = $date1->diff($date2);
            $minuteur =   $interval->format('%H:%I:%S');

            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_v2', 'root', '');

            $sql = "select  * from infotabscore order by score DESC;";
            $res = $pdo->query($sql);
            $lignes = $res->fetchAll();
            $i = 1;

            $partie = json_encode(['partie' => $lignes, 'minuteur' => ['time' => $minuteur]]);
            echo $partie;

            break;
        }

    case 'testFlag': {
            $flag = $_REQUEST['flag'];
            $numCHallenge = $_REQUEST['numChallenge'];
            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_v2', 'root', '');
            $sql = "SELECT flag from enigme where numEnigme=:numChallenge;";
            // requete préparée 
            $sql = $pdo->prepare($sql);
            $res = $sql->execute([ 'numChallenge' => $numCHallenge]);
            $lignes = $sql->fetch();

            if (password_verify($flag, $lignes['flag'])) {
                echo 'true';
            } else {
                echo 'false';
            }
            break;
        }

    case 'addPoint': {
            $numChallenge = $_REQUEST['numChallenge'];
            $idEquipe = $_REQUEST['idEquipe'];
            $numPartie = $_REQUEST['idPartie'];

            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_v2', 'root', '');


            $sql = "INSERT INTO `validation`(`noEnigme`, `idEquipe`) VALUES (:numChallenge, :idEquipe);";
            $sql = $pdo->prepare($sql);
            $res = $sql->execute(['numChallenge' => $numChallenge, 'idEquipe' => $idEquipe]);

            // gestion des erreurs
            if ($res) {
                echo 'true';
            } else {
                echo 'false';
            }
            break;
        }

    default: {
            // include("vues/v_connexion.php");
            // break;
        }
}
