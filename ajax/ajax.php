<?php

switch ($_REQUEST['action']) {
    case 'tabScore': {

            $date1 = new DateTime('now', new DateTimeZone('Indian/Reunion'));
            $date2 = new DateTime('2022-11-16 17:30:00', new DateTimeZone('Indian/Reunion'));
            $interval = $date1->diff($date2);
            $minuteur =   $interval->format('%H:%I:%S');

            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_victor', 'root', '');

            $sql = "select id, libelle, scoreTotal  from equipe order by scoreTotal DESC;";
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
            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_victor', 'root', '');
            $sql = "SELECT * from challenge where flag=:flag and numero=:numChallenge;";
            // requete préparée 
            $sql = $pdo->prepare($sql);
            $res = $sql->execute(['flag' => $flag, 'numChallenge' => $numCHallenge]);
            $lignes = $sql->fetchAll();

            if (count($lignes) > 0) {
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

            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_victor', 'root', '');


            $sql = "INSERT INTO `concerner`(`numChallenge`, `numPartie`, `dateChallenge`, `idEquipe`) VALUES (:numChallenge, :numPartie, current_timestamp(), :idEquipe);";
            $sql = $pdo->prepare($sql);
            $res = $sql->execute(['numChallenge' => $numChallenge, 'numPartie' => $numPartie, 'idEquipe' => $idEquipe]);

            // gestion des erreurs
            if ($res1) {
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
