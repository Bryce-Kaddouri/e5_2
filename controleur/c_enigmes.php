<?php

/**
 * Application CTF Hackathon 2022
 * BTS SIO
 * Lycée de Bellepierre
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = '';
}
$action = $_REQUEST['action'];
echo $action;
switch ($action) {
    case 'afficherEnigmes': {

            include("vues/v_profile.php");
            include("vues/v_difficulte.php");
            $enigmes = $pdo->getEnigmes();
            include("vues/v_enigmes.php");
            break;
        }
    case 'focusEnigme': {
            include("vues/v_profile.php");

            $numChallenge = $_REQUEST['numChallenge'];
            $idEquipe = $pdo->getIdEquipe($_SESSION['login']);

            include("vues/v_difficulte.php");
            // $idPartie = $pdo->getIdPartie($_SESSION['id']);
            $idPartie = 1;
            $enigme = $pdo->getUneEnigme($numChallenge);

            include("vues/v_focusEnigme.php");
            break;
        }

    default: {
            include("vues/v_connexion.php");
            break;
        }
}
